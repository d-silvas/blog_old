<style>
a.show-command {
  margin-bottom: 0;
  font-size: 1.1rem;
  text-decoration: none;
  display: inline-block;
  /* Copied from bootstrap <code>*/
  font-family: SFMono-Regular,Menlo,Monaco,Consolas,"Liberation Mono","Courier New",monospace;
  padding: .2rem .4rem;
  color: #bd4147;
  background-color: #f8f9fa;
  border-radius: .25rem;
}
li.first-level {
  font-size: 1.5rem;
  margin-top: 15px;
}
li.first-level h4 {
  margin: 0;
}
</style>
<!--<img src="../../../assets/images/00setup.png" alt="Setup">-->
<ul>
  <li class="first-level">
    <h4>OSPF</h4>
    <a href="#ospf-show-ip-protocols" class="show-command"><code># <b>show ip protocols</b></code></a><br>
    <a href="#ospf-show-ip-ospf" class="show-command"><code># <b>show ip ospf</b></code></a><br>
    <a href="#ospf-show-ip-ospf-interface" class="show-command"><code># <b>show ip ospf interface [fa0/0]</b></code></a><br>
    <a href="#ospf-show-ip-ospf-neighbor" class="show-command"><code># <b>show ip ospf neighbor</b></code></a><br>
    <a href="#ospf-show-ip-route" class="show-command"><code># <b>show ip route</b></code></a><br>
    <a href="#ospf-show-run-section-ospf" class="show-command"><code># <b>show run | section ospf</b></code></a><br>
  </li>
  <li class="first-level">
    <h4>STP</h4>
    <a href="#stp-show-cdp-neighbor" class="show-command"><code># <b>show cdp neighbor</b></code></a><br>
    <a href="#stp-show-spanning-tree" class="show-command"><code># <b>show spanning-tree</b></code></a><br>
  </li>
</ul>
<br><br>
<h4>Examples</h4>
<hr>
<ul>
  <li class="first-level">
    <h4>OSPF</h4>
  </li>
</ul>
<pre id="ospf-show-ip-protocols" class="terminal">Sock# <b>show ip protocols</b>
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
</pre>
<pre id="ospf-show-ip-ospf" class="terminal">Shoe# <b>show ip ospf</b>
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
 Incremental-SPF disabledSock# show ip ospf interface se1/0
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
</pre>
<pre id="ospf-show-ip-ospf-interface" class="terminal">Shoe# <b>show ip ospf interface f0/0</b>
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

Sock# <b>show ip ospf interface se1/0</b>
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
<pre id="ospf-show-ip-ospf-neighbor" class="terminal">Sock# <b>sh ip ospf neighbor</b>
Neighbor ID     Pri   State           Dead Time   Address         Interface
4.4.4.4           0   FULL/  -        00:00:32    10.1.2.2        Serial1/0
1.1.1.1          10   FULL/DR         00:00:38    10.1.1.1        FastEthernet0/0
2.2.2.2           1   FULL/DROTHER    00:00:38    10.1.1.2        FastEthernet0/0
</pre>
<pre id="ospf-show-ip-route" class="terminal">Tie# <b>sh ip route</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is 10.0.0.2 to network 0.0.0.0

     10.0.0.0/8 is variably subnetted, 10 subnets, 2 masks
O       10.2.0.0/24 [110/65] via 10.2.1.2, 00:18:21, Serial1/0
O       10.2.0.0/21 is a summary, 00:18:21, Null0
C       10.2.1.0/24 is directly connected, Serial1/0
O       10.2.2.0/24 [110/65] via 10.2.1.2, 00:18:21, Serial1/0
C       10.0.0.0/24 is directly connected, FastEthernet0/0
O       10.2.3.0/24 [110/65] via 10.2.1.2, 00:18:21, Serial1/0
O IA    10.1.0.0/21 [110/65] via 10.0.0.2, 00:18:21, FastEthernet0/0
O       10.2.4.0/24 [110/65] via 10.2.1.2, 00:18:22, Serial1/0
O       10.2.5.0/24 [110/65] via 10.2.1.2, 00:18:22, Serial1/0
O IA    10.51.0.0/21 [110/65] via 10.0.0.3, 00:17:44, FastEthernet0/0
O*E2 0.0.0.0/0 [110/1] via 10.0.0.2, 00:01:34, FastEthernet0/0
</pre>
<pre id="ospf-show-run-section-ospf" class="terminal">
</pre>
<br>
<ul>
  <li class="first-level">
    <h4>STP</h4>
  </li>
</ul>
<pre id="stp-show-cdp-neighbor" class="terminal">S1# <b>show cdp neighbor</b>
Capability Codes: R - Router, T - Trans Bridge, B - Source Route Bridge
                  S - Switch, H - Host, I - IGMP, r - Repeater

Device ID        Local Intrfce     Holdtme    Capability  Platform  Port ID
S3               Fas 1/3            176          S I      3725      Fas 1/0
S2               Fas 1/2            152          S I      3725      Fas 1/0
S5               Fas 1/5            127          S I      3725      Fas 1/0
S4               Fas 1/4            173          S I      3725      Fas 1/0
</pre>
<pre id="stp-show-spanning-tree" class="terminal">! On a real switch we would see port role as well (Root/Desg/Altn)
S1# <b>show spanning-tree</b>
VLAN1
  Spanning tree enabled protocol ieee
  Root ID    Priority    32768
             Address     c205.0971.0000
             Cost        19
             Port        46 (FastEthernet1/5)
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec

  Bridge ID  Priority    32768
             Address     c207.0961.0000
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec
             Aging Time 300

Interface                                   Designated
Name                 Port ID Prio Cost  Sts Cost  Bridge ID            Port ID
-------------------- ------- ---- ----- --- ----- -------------------- -------
FastEthernet1/2      128.43   128    19 BLK    19 32768 c206.0961.0000 128.41
FastEthernet1/3      128.44   128    19 FWD    19 32768 c207.0961.0000 128.44
FastEthernet1/4      128.45   128    19 FWD    19 32768 c207.0961.0000 128.45
FastEthernet1/5      128.46   128    19 FWD     0 32768 c205.0971.0000 128.41


S5# <b>show spanning-tree</b>
VLAN1
  Spanning tree enabled protocol ieee
  Root ID    Priority    32768
             Address     c205.0971.0000
             This bridge is the root
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec

  Bridge ID  Priority    32768
             Address     c205.0971.0000
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec
             Aging Time 300

Interface                                   Designated
Name                 Port ID Prio Cost  Sts Cost  Bridge ID            Port ID
-------------------- ------- ---- ----- --- ----- -------------------- -------
FastEthernet1/0      128.41   128    19 FWD     0 32768 c205.0971.0000 128.41
FastEthernet1/1      128.42   128    19 FWD     0 32768 c205.0971.0000 128.42
</pre>
<br>
