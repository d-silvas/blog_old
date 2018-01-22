<style>
</style>
<h4 class="subtitle">Setup</h4>
<img src="../../../assets/images/0003.png" alt="Setup">
<br>
<br>
<h4 class="subtitle">Objectives</h4>
<ol>
  <li>
    Configure all routers shown to operate in the backbone area.
    Hardcode Router IDs so they do not easily change.
  </li>
  <li>
    Determine which router became the DR;
    elect "Tie" as the DR moving forward.
  </li>
  <li>
    Adjust the metric of OSPF to function well with speeds
    up to 10G links.
  </li>
  <li>
    Ensure "Shoe" does not form OSPF neighbors on its LAN network.
  </li>
  <li>
    Adjust the Hello timer on the "Sock" WAN interface to send
    Hello messages 1/sec.
  </li>
  <li>
    <b>Bonus:</b> create loopback interfaces in such a way that
    Router IDs are pingable from any router.
  </li>
</ol>
<br>
<h4><b>[1]</b> Base configuration</h4>
<hr>
<ul><li>
  Configure <b>Shoe</b> router.
</li></ul>
<pre class="terminal">Shoe(config)# <b>router ospf 1</b>
Shoe(config-router)# <b>router-id 4.4.4.4</b>
Shoe(config-router)# <b>network 10.1.3.1 0.0.0.0 area 0</b>
Shoe(config-router)# <b>network 10.1.2.2 0.0.0.0 area 0</b>
</pre>
<br>
<ul><li>
  Configure <b>Sock</b> router. When we add the link that was connected to <b>Shoe</b>,
  a new neighbor message appears.
</li></ul>
<pre class="terminal">Sock(config)# <b>router ospf 1</b>
Sock(config-router)# <b>router-id 3.3.3.3</b>
Sock(config-router)# <b>network 10.1.2.1 0.0.0.0 area 0</b>
Sock(config-router)#
*Mar  1 01:08:23.687: %OSPF-5-ADJCHG: Process 1, Nbr 4.4.4.4 on Serial1/0 from LOADING to FULL, Loading Done
Sock(config-router)# <b>network 10.1.1.0 0.0.0.255 area 0</b>
</pre>
<br>
<ul><li>
  Verification on <b>Sock</b>. We can see 4.4.4.4 as Information Source in <b>show ip protocols</b>.
  We see that we are in a Full state with <b>Shoe</b>. After <b>FULL</b> we should see if the Device
  is DR or BDR, but as this connection is PPP, we don't.
</li></ul>
<pre class="terminal">Sock# <b>show ip protocols</b>
Routing Protocol is "ospf 1"
  Outgoing update filter list for all interfaces is not set
  Incoming update filter list for all interfaces is not set
  Router ID 3.3.3.3
  Number of areas in this router is 1. 1 normal 0 stub 0 nssa
  Maximum path: 4
  Routing for Networks:
    10.1.1.0 0.0.0.255 area 0
    10.1.2.1 0.0.0.0 area 0
 Reference bandwidth unit is 100 mbps
  Routing Information Sources:
    Gateway         Distance      Last Update
    3.3.3.3              110      00:02:04
    4.4.4.4              110      00:02:27
  Distance: (default is 110)

Sock# <b>show ip ospf neighbor</b>
Neighbor ID     Pri   State           Dead Time   Address         Interface
4.4.4.4           0   FULL/  -        00:00:33    10.1.2.2        Serial1/0

Sock# <b>show ip route</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/24 is subnetted, 3 subnets
O       10.1.3.0 [110/65] via 10.1.2.2, 00:16:00, Serial1/0
C       10.1.2.0 is directly connected, Serial1/0
C       10.1.1.0 is directly connected, FastEthernet0/0
</pre>
<br>
<ul><li>
  Configure router <b>Tie</b>. Note that we leave its router ID to be configured automatically.
</li></ul>
<pre class="terminal">Tie(config)# <b>router ospf 1</b>
Tie(config-router)# <b>network 10.1.1.1 0.0.0.0 area 0</b>
Tie(config-router)#
*Mar  1 01:29:25.775: %OSPF-5-ADJCHG: Process 1, Nbr 3.3.3.3 on FastEthernet0/0 from LOADING to FULL, Loading Done
</pre>
<br>
<ul><li>
  Now, <b>Sock</b> has been automatically configured as a DR and <b>Tie</b> as a BDR.
</li></ul>
<pre class="terminal">Sock# <b>show ip ospf neighbor</b>
Neighbor ID     Pri   State           Dead Time   Address         Interface
10.1.1.1          1   FULL/BDR        00:00:31    10.1.1.1        FastEthernet0/0
4.4.4.4           0   FULL/  -        00:00:30    10.1.2.2        Serial1/0

Tie# <b>show ip ospf neighbor</b>
Neighbor ID     Pri   State           Dead Time   Address         Interface
3.3.3.3           1   FULL/DR         00:00:31    10.1.1.3        FastEthernet0/0
</pre>
<br>
<ul><li>
  Note that in order to fix a router id missconfiguration, we have to either reboot the router
  or issue the <b>clear ip ospf process</b> command.
</li></ul>
<pre class="terminal">Tie(config)# <b>router ospf 1</b>
Tie(config-router)# <b>router-id 1.1.1.1</b>
Reload or use "clear ip ospf process" command, for this to take effect
Tie(config-router)#^Z
Tie# <b>clear ip ospf process</b>
Reset ALL OSPF processes? [no]: y
Tie#
*Mar  1 01:35:17.275: %OSPF-5-ADJCHG: Process 1, Nbr 3.3.3.3 on FastEthernet0/0 from FULL to DOWN, Neighbor Down: Interface down or detached
</pre>
<ul><ul><li>After this, <b>Tie</b> will be the DR for the 10.1.1.0/24 network.</li></ul></ul>
<br>
<ul><li>
  Finish with <b>Belt</b> configuration. We issue the <b>debug</b> command so we can see the process.
  We see two neighbors forming at the same time
</li></ul>
<pre class="terminal">Belt# <b>debug ip ospf adj</b>
OSPF adjacency events debugging is on
Belt(config)# <b>router ospf 1</b>
Belt(config-router)# <b>router-id 2.2.2.2</b>
Belt(config-router)# <b>network 10.1.1.2 0.0.0.0 area 0</b>

*Mar  1 01:42:54.503: OSPF: Interface FastEthernet0/0 going Up
*Mar  1 01:42:54.519: OSPF: 2 Way Communication to 3.3.3.3 on FastEthernet0/0, state 2WAY
*Mar  1 01:42:54.539: OSPF: Rcv DBD from 3.3.3.3 on FastEthernet0/0 seq 0x183E opt 0x52 flag 0x7 len 32  mtu 1500 state 2WAY
*Mar  1 01:42:54.539: OSPF: Nbr state is 2WAY
*Mar  1 01:42:55.003: OSPF: Build router LSA for area 0, router ID 2.2.2.2, seq 0x80000001, process 1
*Mar  1 01:42:59.543: OSPF: Rcv DBD from 3.3.3.3 on FastEthernet0/0 seq 0x183E opt 0x52 flag 0x7 len 32  mtu 1500 state 2WAY
*Mar  1 01:42:59.543: OSPF: Nbr state is 2WAY
*Mar  1 01:42:59.787: OSPF: 2 Way Communication to 1.1.1.1 on FastEthernet0/0, state 2WAY
*Mar  1 01:42:59.787: OSPF: Backup seen Event before WAIT timer on FastEthernet0/0
*Mar  1 01:42:59.791: OSPF: DR/BDR election on FastEthernet0/0
*Mar  1 01:42:59.795: OSPF: Elect BDR 1.1.1.1
*Mar  1 01:42:59.795: OSPF: Elect DR 3.3.3.3
*Mar  1 01:42:59.799:        DR: 3.3.3.3 (Id)   BDR: 1.1.1.1 (Id)
*Mar  1 01:42:59.799: OSPF: Send DBD to 1.1.1.1 on FastEthernet0/0 seq 0x18BA opt 0x52 flag 0x7 len 32
*Mar  1 01:42:59.803: OSPF: Send DBD to 3.3.3.3 on FastEthernet0/0 seq 0x22 opt 0x52 flag 0x7 len 32
*Mar  1 01:42:59.831: OSPF: Rcv DBD from 1.1.1.1 on FastEthernet0/0 seq 0x2542 opt 0x52 flag 0x7 len 32  mtu 1500 state EXSTART
*Mar  1 01:42:59.831: OSPF: First DBD and we are not SLAVE
*Mar  1 01:42:59.839: OSPF: Rcv DBD from 1.1.1.1 on FastEthernet0/0 seq 0x18BA opt 0x52 flag 0x2 len 112  mtu 1500 state EXSTART
*Mar  1 01:42:59.839: OSPF: NBR Negotiation Done. We are the MASTER
*Mar  1 01:42:59.843: OSPF: Send DBD to 1.1.1.1 on FastEthernet0/0 seq 0x18BB opt 0x52 flag 0x3 len 52
*Mar  1 01:42:59.859: OSPF: Rcv DBD from 1.1.1.1 on FastEthernet0/0 seq 0x18BB opt 0x52 flag 0x0 len 32  mtu 1500 state EXCHANGE
*Mar  1 01:42:59.859: OSPF: Send DBD to 1.1.1.1 on FastEthernet0/0 seq 0x18BC opt 0x52 flag 0x1 len 32
*Mar  1 01:42:59.863: OSPF: Send LS REQ to 1.1.1.1 length 48 LSA count 4
*Mar  1 01:42:59.879: OSPF: Rcv LS REQ from 1.1.1.1 on FastEthernet0/0 length 36 LSA count 1
*Mar  1 01:42:59.883: OSPF: Send UPD to 10.1.1.1 on FastEthernet0/0 length 40 LSA count 1
*Mar  1 01:42:59.891: OSPF: Rcv DBD from 1.1.1.1 on FastEthernet0/0 seq 0x18BC opt 0x52 flag 0x0 len 32  mtu 1500 state EXCHANGE
*Mar  1 01:42:59.891: OSPF: Exchange Done with 1.1.1.1 on FastEthernet0/0
*Mar  1 01:42:59.903: OSPF: Rcv LS UPD from 1.1.1.1 on FastEthernet0/0 length 216 LSA count 4
*Mar  1 01:42:59.903: OSPF: Synchronized with 1.1.1.1 on FastEthernet0/0, state FULL
*Mar  1 01:42:59.903: %OSPF-5-ADJCHG: Process 1, Nbr 1.1.1.1 on FastEthernet0/0 from LOADING to FULL, Loading Done
*Mar  1 01:43:04.543: OSPF: Rcv DBD from 3.3.3.3 on FastEthernet0/0 seq 0x183E opt 0x52 flag 0x7 len 32  mtu 1500 state EXSTART
*Mar  1 01:43:04.547: OSPF: NBR Negotiation Done. We are the SLAVE
*Mar  1 01:43:04.547: OSPF: Send DBD to 3.3.3.3 on FastEthernet0/0 seq 0x183E opt 0x52 flag 0x2 len 132
*Mar  1 01:43:04.567: OSPF: Rcv DBD from 3.3.3.3 on FastEthernet0/0 seq 0x183F opt 0x52 flag 0x3 len 112  mtu 1500 state EXCHANGE
*Mar  1 01:43:04.567: OSPF: Send DBD to 3.3.3.3 on FastEthernet0/0 seq 0x183F opt 0x52 flag 0x0 len 32
*Mar  1 01:43:04.579: OSPF: Rcv DBD from 3.3.3.3 on FastEthernet0/0 seq 0x1840 opt 0x52 flag 0x1 len 32  mtu 1500 state EXCHANGE
*Mar  1 01:43:04.579: OSPF: Exchange Done with 3.3.3.3 on FastEthernet0/0
*Mar  1 01:43:04.579: OSPF: Synchronized with 3.3.3.3 on FastEthernet0/0, state FULL
*Mar  1 01:43:04.579: %OSPF-5-ADJCHG: Process 1, Nbr 3.3.3.3 on FastEthernet0/0 from LOADING to FULL, Loading Done
*Mar  1 01:43:04.579: OSPF: Send DBD to 3.3.3.3 on FastEthernet0/0 seq 0x1840 opt 0x52 flag 0x0 len 32
*Mar  1 01:43:04.587: OSPF: Rcv LS REQ from 3.3.3.3 on FastEthernet0/0 length 36 LSA count 1
*Mar  1 01:43:04.591: OSPF: Send UPD to 10.1.1.3 on FastEthernet0/0 length 40 LSA count 1
*Mar  1 01:43:04.599: OSPF: Rcv LS UPD from 3.3.3.3 on FastEthernet0/0 length 64 LSA count 1
*Mar  1 01:43:05.083: OSPF: Build router LSA for area 0, router ID 2.2.2.2, seq 0x80000002, process 1
*Mar  1 01:43:05.107: OSPF: Rcv LS UPD from 3.3.3.3 on FastEthernet0/0 length 64 LSA count 1
*Mar  1 01:43:05.155: OSPF: Rcv LS UPD from 3.3.3.3 on FastEthernet0/0 length 64 LSA count 1
</pre>
<ul><ul>
  <li>
    The order is confusing because <b>Tie</b> is communicating with two other routers
    at the same time. It starts forming 2-WAY relationships with them and after that,
    negotiations to select the DR and BDR are performed.
  </li>
  <li>
    States: 2-WAY -> EXSTART -> EXCHANGE.
  </li>
</ul></ul>
<br>
<h4><b>[2]</b> DR election</h4>
<hr>
<ul>
  <li>
    The automatic choice of the DR may be altered by the order in which we configure
    the routers or the order in which they reboot, not always setting the one with highest
    Router ID as a DR. In normal broadcast (Ethernet) networks this is not a big deal.
  </li>
  <li>
    Priority can be manually changed. Remember that if the DR and BDR are already set,
    nothing will happen until we reset the ospf process on the rest of the routers:
  </li>
</ul>
<pre class="terminal">Tie(config)# <b>int fa0/0</b>
Tie(config-if)# <b>ip ospf priority 10</b>
</pre>
<pre class="terminal">Belt# <b>clear ip ospf process</b>
Reset ALL OSPF processes? [no]: y

Sock# <b>clear ip ospf process</b>
Reset ALL OSPF processes? [no]: y
</pre>
<ul>
  <li>
    We can verify that Tie was set as the new DR with <b>show ip ospf neighbor</b>
    or <b>show ip ospf interface</b> commands.
  </li>
</ul>
<pre class="terminal">Sock# <b>sh ip ospf neighbor</b>
Neighbor ID     Pri   State           Dead Time   Address         Interface
4.4.4.4           0   FULL/  -        00:00:32    10.1.2.2        Serial1/0
1.1.1.1          10   FULL/DR         00:00:38    10.1.1.1        FastEthernet0/0
2.2.2.2           1   FULL/DROTHER    00:00:38    10.1.1.2        FastEthernet0/0

Sock# <b>sh ip ospf interface</b>
Serial1/0 is up, line protocol is up
  Internet Address 10.1.2.1/24, Area 0
  Process ID 1, Router ID 3.3.3.3, Network Type POINT_TO_POINT, Cost: 64
  Transmit Delay is 1 sec, State POINT_TO_POINT
  Timer intervals configured, Hello 10, Dead 40, Wait 40, Retransmit 5
    oob-resync timeout 40
    Hello due in 00:00:05
  Supports Link-local Signaling (LLS)
  Cisco NSF helper support enabled
  IETF NSF helper support enabled
  Index 2/2, flood queue length 0
  Next 0x0(0)/0x0(0)
  Last flood scan length is 1, maximum is 2
  Last flood scan time is 0 msec, maximum is 4 msec
  Neighbor Count is 1, Adjacent neighbor count is 1
    Adjacent with neighbor 4.4.4.4
  Suppress hello for 0 neighbor(s)
FastEthernet0/0 is up, line protocol is up
  Internet Address 10.1.1.3/24, Area 0
  Process ID 1, Router ID 3.3.3.3, Network Type BROADCAST, Cost: 1
  Transmit Delay is 1 sec, State BDR, Priority 1
  Designated Router (ID) 1.1.1.1, Interface address 10.1.1.1
  Backup Designated router (ID) 3.3.3.3, Interface address 10.1.1.3
  Timer intervals configured, Hello 10, Dead 40, Wait 40, Retransmit 5
    oob-resync timeout 40
    Hello due in 00:00:02
  Supports Link-local Signaling (LLS)
  Cisco NSF helper support enabled
  IETF NSF helper support enabled
  Index 1/1, flood queue length 0
  Next 0x0(0)/0x0(0)
  Last flood scan length is 0, maximum is 1
  Last flood scan time is 0 msec, maximum is 4 msec
  Neighbor Count is 2, Adjacent neighbor count is 2
    Adjacent with neighbor 1.1.1.1  (Designated Router)
    Adjacent with neighbor 2.2.2.2
  Suppress hello for 0 neighbor(s)

Tie# <b>sh ip ospf int</b>
FastEthernet0/0 is up, line protocol is up
  Internet Address 10.1.1.1/24, Area 0
  Process ID 1, Router ID 1.1.1.1, Network Type BROADCAST, Cost: 1
  Transmit Delay is 1 sec, State DR, Priority 10
  Designated Router (ID) 1.1.1.1, Interface address 10.1.1.1
  Backup Designated router (ID) 3.3.3.3, Interface address 10.1.1.3
  Timer intervals configured, Hello 10, Dead 40, Wait 40, Retransmit 5
    oob-resync timeout 40
    Hello due in 00:00:09
  Supports Link-local Signaling (LLS)
  Cisco NSF helper support enabled
  IETF NSF helper support enabled
  Index 1/1, flood queue length 0
  Next 0x0(0)/0x0(0)
  Last flood scan length is 1, maximum is 1
  Last flood scan time is 0 msec, maximum is 4 msec
  Neighbor Count is 2, Adjacent neighbor count is 2
    Adjacent with neighbor 2.2.2.2
    Adjacent with neighbor 3.3.3.3  (Backup Designated Router)
  Suppress hello for 0 neighbor(s)
</pre>
<br>
<ul>
  <li>
    In Non-Broadcast Multiaccess Networks (NBMNs), with Hub-And-Spoke topologies,
    routers "think" that they are all directly connected between eachother,
    but they are not: they get to eachother through the Hub router.
    In this situation, we want the Hub router to be the DR and the rest (Spoke
    routers) to never become one. For this purpose, we set their OSPF priority to <b>0</b>.
  </li>
</ul>
<img src="../../../assets/images/0004.png" alt="Hub-And-Spoke topology">
<br>
<h4><b>[3]</b> Metric adjustment</h4>
<hr>
<ul>
  <li>
    OSPF uses a metric known as <b>cost</b>. It is calculated with the formula 100 / (Interface bandwith in Mbps).
    For example, for T1 (1.544Mbps) it's 64 (rounds it). OSPF actually adds up the cost
    corresponding to all of the interfaces a packet has to go through in order to reach the network.
    For example, the cost for <b>Sock</b> to reach 10.1.3.0/24 is 65 (the serial link is 64,
    plus 1 for the FastEthernet interface).
  </li>
</ul>
<pre class="terminal">Sock#sh ip route
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/24 is subnetted, 3 subnets
O       10.1.3.0 [110/65] via 10.1.2.2, 00:46:05, Serial1/0
C       10.1.2.0 is directly connected, Serial1/0
C       10.1.1.0 is directly connected, FastEthernet0/0
</pre>
<br>
<ul>
  <li>
    In order to modify the cost of a link we can change the <b>bandwith</b> value of one interface
    or hardcode it on the OSPF settings for that interface (not recommended)
  </li>
</ul>
<pre class="terminal">Shoe(config)# <b>int f0/0</b>
Shoe(config-if)# <b>bandwidth 100000</b>
Shoe(config-if)# <b>ip ospf cost 5</b>
</pre>
<pre class="terminal">Shoe# <b>sh interfaces f0/0</b>
FastEthernet0/0 is up, line protocol is up
  Hardware is Gt96k FE, address is c207.0fdb.0000 (bia c207.0fdb.0000)
  Internet address is 10.1.3.1/24
  MTU 1500 bytes, BW 100000 Kbit/sec, DLY 100 usec,
     reliability 255/255, txload 1/255, rxload 1/255
  Encapsulation ARPA, loopback not set
  Keepalive set (10 sec)
  Full-duplex, 100Mb/s, 100BaseTX/FX
  ARP type: ARPA, ARP Timeout 04:00:00
  Last input 00:00:55, output 00:00:00, output hang never
  Last clearing of "show interface" counters never
  Input queue: 0/75/0/0 (size/max/drops/flushes); Total output drops: 0
  Queueing strategy: fifo
  Output queue: 0/40 (size/max)
  5 minute input rate 0 bits/sec, 0 packets/sec
  5 minute output rate 0 bits/sec, 0 packets/sec
     106 packets input, 37948 bytes
     Received 106 broadcasts, 0 runts, 0 giants, 0 throttles
     0 input errors, 0 CRC, 0 frame, 0 overrun, 0 ignored
     0 watchdog
     0 input packets with dribble condition detected
     1380 packets output, 133221 bytes, 0 underruns
     0 output errors, 0 collisions, 2 interface resets
     0 babbles, 0 late collision, 0 deferred
     0 lost carrier, 0 no carrier
     0 output buffer failures, 0 output buffers swapped out

Shoe# <b>sh ip ospf interface f0/0</b>
FastEthernet0/0 is up, line protocol is up
  Internet Address 10.1.3.1/24, Area 0
  Process ID 1, Router ID 4.4.4.4, Network Type BROADCAST, Cost: 5
  Transmit Delay is 1 sec, State DR, Priority 1
  Designated Router (ID) 4.4.4.4, Interface address 10.1.3.1
  No backup designated router on this network
  Timer intervals configured, Hello 10, Dead 40, Wait 40, Retransmit 5
    oob-resync timeout 40
    Hello due in 00:00:01
  Supports Link-local Signaling (LLS)
  Cisco NSF helper support enabled
  IETF NSF helper support enabled
  Index 2/2, flood queue length 0
  Next 0x0(0)/0x0(0)
  Last flood scan length is 0, maximum is 0
  Last flood scan time is 0 msec, maximum is 0 msec
  Neighbor Count is 0, Adjacent neighbor count is 0
  Suppress hello for 0 neighbor(s)
</pre>
<br>
<ul>
  <li>
    This formula is not ready for new technologies, as it rounds everything over
    100Mbps to cost 1. In order to adapt the formula to modern speeds, we need
    to change the OSPF settings on each router. This commands allows us to modify
    the reference bandwith (the number on top of the division in the cost formula)
    per interface. This reference is given in Mbps.
  </li>
</ul>
<pre class="terminal">Sock(config)# <b>router ospf 1</b>
Sock(config-router)# <b>auto-cost reference-bandwidth 10000</b>
% OSPF: Reference bandwidth is changed.
        Please ensure reference bandwidth is consistent across all routers.
</pre>
<br>
<h4><b>[4]</b> Passive networks</h4>
<hr>
<ul>
  <li>
    It's a good security measure to stop OSPF from sending Hello messages from
    interfaces in which we don't want OSPF (someone can connect another router
    to the network and fuck things up). Two approaches:
  </li>
</ul>
<pre class="terminal">Shoe(config)# <b>router ospf 1</b>
Shoe(config-router)# <b>passive-interface fa0/0</b>
</pre>
<pre class="terminal">Shoe(config)# <b>router ospf 1</b>
Shoe(config-router)# <b>passive-interface default</b>
Shoe(config-router)# <b>no passive-interface se1/0</b>
</pre>
<br>
<ul>
  <li>
    Verification: note the <b>No Hellos (Passive interface)</b> line.
  </li>
</ul>
<pre class="terminal">Shoe# <b>show ip ospf interface f0/0</b>
FastEthernet0/0 is up, line protocol is up
  Internet Address 10.1.3.1/24, Area 0
  Process ID 1, Router ID 4.4.4.4, Network Type BROADCAST, Cost: 5
  Transmit Delay is 1 sec, State DR, Priority 1
  Designated Router (ID) 4.4.4.4, Interface address 10.1.3.1
  No backup designated router on this network
  Timer intervals configured, Hello 10, Dead 40, Wait 40, Retransmit 5
    oob-resync timeout 40
    No Hellos (Passive interface)
  Supports Link-local Signaling (LLS)
  Cisco NSF helper support enabled
  IETF NSF helper support enabled
  Index 2/2, flood queue length 0
  Next 0x0(0)/0x0(0)
  Last flood scan length is 0, maximum is 0
  Last flood scan time is 0 msec, maximum is 0 msec
  Neighbor Count is 0, Adjacent neighbor count is 0
  Suppress hello for 0 neighbor(s)
</pre>
<br>
<h4><b>[5]</b> Hello timer</h4>
<hr>
<ul>
  <li>
    Hello timer is changed per interface. Remember that we have to change this
    setting on all other router interfaces connected to that link. Otherwise,
    the routers won't establish neighbor relationships.
  </li>
</ul>
<pre class="terminal">Sock(config-router)# <b>int se1/0</b>
Sock(config-if)# <b>ip ospf hello-interval 1</b>
</pre>
<pre class="terminal">Shoe(config-router)# <b>int se1/0</b>
Shoe(config-if)# <b>ip ospf hello-interval 1</b>
</pre>
<br>
<ul>
  <li>
    Verification:
  </li>
</ul>
<pre class="terminal">Sock# <b>show ip ospf interface se1/0</b>
Serial1/0 is up, line protocol is up
  Internet Address 10.1.2.1/24, Area 0
  Process ID 1, Router ID 3.3.3.3, Network Type POINT_TO_POINT, Cost: 6476
  Transmit Delay is 1 sec, State POINT_TO_POINT
  Timer intervals configured, Hello 1, Dead 4, Wait 4, Retransmit 5
    oob-resync timeout 40
    Hello due in 00:00:00
  Supports Link-local Signaling (LLS)
  Cisco NSF helper support enabled
  IETF NSF helper support enabled
  Index 2/2, flood queue length 0
  Next 0x0(0)/0x0(0)
  Last flood scan length is 1, maximum is 2
  Last flood scan time is 0 msec, maximum is 4 msec
  Neighbor Count is 1, Adjacent neighbor count is 1
    Adjacent with neighbor 4.4.4.4
  Suppress hello for 0 neighbor(s)
</pre>
<br>
<ul>
  <li>
    Note that thi also changed the dead timer from 40 sec to 4 (it's 4 times the
    Helo interval). This effectively reduces the routes convergence time from
    40 sec to 4 sec.
  </li>
</ul>
<br>
<h4><b>[6]</b> Loopback interfaces</h4>
<hr>
<ul>
  <li>
    We can check our router id with the <b>show ip ospf</b> command. We need to
    configure the loopback interface and add it as an OSPF route.
  </li>
</ul>
<pre class="terminal">Shoe# <b>show ip ospf</b>
 Routing Process "ospf 1" with ID 4.4.4.4
 Start time: 00:00:06.792, Time elapsed: 04:33:33.564
 Supports only single TOS(TOS0) routes
 Supports opaque LSA
 Supports Link-local Signaling (LLS)
 Supports area transit capability
 Router is not originating router-LSAs with maximum metric
 Initial SPF schedule delay 5000 msecs
 Minimum hold time between two consecutive SPFs 10000 msecs
 Maximum wait time between two consecutive SPFs 10000 msecs
 Incremental-SPF disabled
 Minimum LSA interval 5 secs
 Minimum LSA arrival 1000 msecs
 LSA group pacing timer 240 secs
 Interface flood pacing timer 33 msecs
 Retransmission pacing timer 66 msecs
 Number of external LSA 0. Checksum Sum 0x000000
 Number of opaque AS LSA 0. Checksum Sum 0x000000
 Number of DCbitless external and opaque AS LSA 0
 Number of DoNotAge external and opaque AS LSA 0
 Number of areas in this router is 1. 1 normal 0 stub 0 nssa
 Number of areas transit capable is 0
 External flood list length 0
 IETF NSF helper support enabled
 Cisco NSF helper support enabled
    Area BACKBONE(0)
	Number of interfaces in this area is 2
	Area has no authentication
	SPF algorithm last executed 00:08:24.624 ago
	SPF algorithm executed 14 times
	Area ranges are
	Number of LSA 5. Checksum Sum 0x01EAC4
	Number of opaque link LSA 0. Checksum Sum 0x000000
	Number of DCbitless LSA 0
	Number of indication LSA 0
	Number of DoNotAge LSA 0
	Flood list length 0

Shoe# <b>conf t</b>
Shoe(config)# <b>interface loopback 0</b>
Shoe(config-if)# <b>ip address 4.4.4.4 255.255.255.255</b>
Shoe(config-if)# <b>router ospf 1</b>
Shoe(config-router)# <b>network 4.4.4.4 0.0.0.0 area 0</b>
</pre>
