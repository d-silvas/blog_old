<style>
</style>
<h4 class="subtitle">Setup</h4>
<img src="../../../assets/images/0005.png" alt="Setup">
<br>
<br>
<h4 class="subtitle">Objectives</h4>
<ol>
  <li>
    Configure all routers shown to operate in a multiarea configuration.
    Tie, belt, and Sock will act as ABRs.
  </li>
  <li>
    Add five (5) loopback interfaces to Ring, Hat and Shoe.
    They should be contiguous to existing area subnets.
  </li>
  <li>
    Add an efficient summary route for area 1, 2 and 51. Verify impact
    on the routing table of other routers.
  </li>
  <li>
    Add a loopback interface to Belt with the IP address 184.51.1.2/24
    and a default route to 184.51.1.1. This will simulate an Internet
    connection.
  </li>
  <li>
    Have Belt advertise the default route to the other routes via OSPF.
    The route should exist even if Belt does not have a default route.
  </li>
</ol>
<br>
<h4><b>[1, 2]</b> Multiarea configuration and loopback interfaces</h4>
<hr>
<ul><li>
  Blow away all previous OSPF configuration and change IP addresses.
</li></ul>
<pre class="terminal">Belt(config)# <b>no router ospf 1</b>
</pre>
<br>
<ul><li>
  Configure OSPF. You create an Area Border Router (ABR) by assigning
  different interfaces to different areas. We also will configure the
  loopback interfaces as requested.
</li></ul>
<pre class="terminal">Belt(config)# <b>router ospf 1</b>
Belt(config-router)# <b>network 10.0.0.2 0.0.0.0 area 0</b>
Belt(config-router)# <b>network 10.1.1.1 0.0.0.0 area 1</b>
</pre>
<pre class="terminal">Ring(config)# <b>router ospf 1</b>
Ring(config-router)# <b>network 10.1.1.2 0.0.0.0 area 1</b>
Ring(config)# <b>interface loopback 0</b>
Ring(config-if)# <b>ip address 10.1.0.1 255.255.255.0</b>
Ring(config-if)# <b>ip ospf network point-to-point</b>
Ring(config-if)# <b>interface loopback 1</b>
Ring(config-if)# <b>ip address 10.1.2.1 255.255.255.0</b>
Ring(config-if)# <b>ip ospf network point-to-point</b>
Ring(config-if)# <b>interface loopback 2</b>
Ring(config-if)# <b>ip address 10.1.3.1 255.255.255.0</b>
Ring(config-if)# <b>ip ospf network point-to-point</b>
Ring(config-if)# <b>interface loopback 3</b>
Ring(config-if)# <b>ip address 10.1.4.1 255.255.255.0</b>
Ring(config-if)# <b>ip ospf network point-to-point</b>
Ring(config-if)# <b>interface loopback 4</b>
Ring(config-if)# <b>ip address 10.1.5.1 255.255.255.0</b>
Ring(config-if)# <b>ip ospf network point-to-point</b>
Ring(config-if)# <b>exit</b>
Ring(config)# <b>router ospf 1</b>
Ring(config-router)# <b>network 10.1.0.0 0.0.255.255 area 1</b>
</pre>
<ul><ul>
  <li>
    Notice that here we "get lazy" and don't write the <b>network</b>
    command interface by interface, as per Cisco recommendations.
  </li>
  <li>
    We need the command <b>ip ospf network point-to-point</b>
    because OSPF recognises the interface as a loopback, and will
    advertise it as a host route (/32). We want it to advertise it as a /24 route.
    Let's see what happens when we don't issue this command (look at the network
    type in <b>show ip ospf interface</b>, and note that it appears in other
    routers as a /32 route). <b>show ip ospf interface</b> even tells us that
    loopback7 is being treated as a stub host:
  </li>
</ul></ul>
<pre class="terminal">Shoe(config)# <b>interface loopback 7</b>
Shoe(config-if)# <b>ip address 10.51.7.1 255.255.255.0</b>
Shoe(config-if)# <b>router ospf 1</b>
Shoe(config-router)# <b>network 10.51.7.1 0.0.0.0 area 51</b>
Shoe(config-router)# <b>^Z</b>
Shoe# <b>show ip ospf interface lo0</b>
Loopback0 is up, line protocol is up
  Internet Address 10.51.0.1/24, Area 51
  Process ID 1, Router ID 4.4.4.4, Network Type POINT_TO_POINT, Cost: 1
  Transmit Delay is 1 sec, State POINT_TO_POINT
  Timer intervals configured, Hello 10, Dead 40, Wait 40, Retransmit 5
    oob-resync timeout 40
  Supports Link-local Signaling (LLS)
  Cisco NSF helper support enabled
  IETF NSF helper support enabled
  Index 2/2, flood queue length 0
  Next 0x0(0)/0x0(0)
  Last flood scan length is 0, maximum is 0
  Last flood scan time is 0 msec, maximum is 0 msec
  Neighbor Count is 0, Adjacent neighbor count is 0
  Suppress hello for 0 neighbor(s)
Shoe# <b>show ip ospf interface lo7</b>
Loopback7 is up, line protocol is up
  Internet Address 10.51.7.1/24, Area 51
  Process ID 1, Router ID 4.4.4.4, Network Type LOOPBACK, Cost: 1
  Loopback interface is treated as a stub Host
</pre>
<pre class="terminal">Belt#sh ip route
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
!! Many lines omitted...

     10.0.0.0/8 is variably subnetted, 20 subnets, 2 masks
!! Many lines omitted...
O IA    10.51.1.0/24 [110/65] via 10.0.0.3, 00:41:48, FastEthernet0/0
O IA    10.51.0.0/24 [110/66] via 10.0.0.3, 00:32:36, FastEthernet0/0
O IA    10.51.3.0/24 [110/66] via 10.0.0.3, 00:32:36, FastEthernet0/0
O IA    10.51.2.0/24 [110/66] via 10.0.0.3, 00:32:36, FastEthernet0/0
O IA    10.51.5.0/24 [110/66] via 10.0.0.3, 00:32:36, FastEthernet0/0
O IA    10.51.4.0/24 [110/66] via 10.0.0.3, 00:32:36, FastEthernet0/0
O IA    10.51.7.1/32 [110/66] via 10.0.0.3, 00:04:26, FastEthernet0/0
</pre>
<br>
<ul>
  <li>
    Check the routes.
  </li>
</ul>
<pre class="terminal">Ring# <b>sh ip route</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/24 is subnetted, 7 subnets
C       10.1.3.0 is directly connected, Loopback2
C       10.1.2.0 is directly connected, Loopback1
C       10.1.1.0 is directly connected, Serial1/0
O IA    10.0.0.0 [110/65] via 10.1.1.1, 00:23:34, Serial1/0
C       10.1.0.0 is directly connected, Loopback0
C       10.1.5.0 is directly connected, Loopback4
C       10.1.4.0 is directly connected, Loopback3
</pre>
<pre class="terminal">Belt# <b>show ip route</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/24 is subnetted, 7 subnets
O       10.1.3.0 [110/65] via 10.1.1.2, 00:06:57, Serial1/0
O       10.1.2.0 [110/65] via 10.1.1.2, 00:06:57, Serial1/0
C       10.1.1.0 is directly connected, Serial1/0
C       10.0.0.0 is directly connected, FastEthernet0/0
O       10.1.0.0 [110/65] via 10.1.1.2, 00:06:57, Serial1/0
O       10.1.5.0 [110/65] via 10.1.1.2, 00:06:57, Serial1/0
O       10.1.4.0 [110/65] via 10.1.1.2, 00:06:57, Serial1/0
</pre>
<ul><ul>
  <li>
    <b>Ring</b> sees 10.0.0.0/24 as an <b>IA</b> (InterArea) route because
    the route belongs to Area 0 and the router is on Area 1.
  </li>
  <li>
    <b>Belt</b> is an ABR ("belongs to Area 0 and 1"), so he doens't see
    these routes as interarea;
  </li>
</ul></ul>
<ul><li> Configure the rest of the things</li></ul>
<pre class="terminal">Tie(config)# <b>router ospf 1</b>
Tie(config-router)# <b>network 10.0.0.1 0.0.0.0 area 0</b>
Tie(config-router)# <b>network 10.2.1.1 0.0.0.0 area 2</b>
</pre>
<pre class="terminal">Tie(config)# <b>show ip route</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/24 is subnetted, 8 subnets
O IA    10.1.3.0 [110/66] via 10.0.0.2, 00:04:47, FastEthernet0/0
C       10.2.1.0 is directly connected, Serial1/0
O IA    10.1.2.0 [110/66] via 10.0.0.2, 00:04:47, FastEthernet0/0
O IA    10.1.1.0 [110/65] via 10.0.0.2, 00:04:47, FastEthernet0/0
C       10.0.0.0 is directly connected, FastEthernet0/0
O IA    10.1.0.0 [110/66] via 10.0.0.2, 00:04:47, FastEthernet0/0
O IA    10.1.5.0 [110/66] via 10.0.0.2, 00:04:47, FastEthernet0/0
O IA    10.1.4.0 [110/66] via 10.0.0.2, 00:04:48, FastEthernet0/0
</pre>
<ul><ul><li>
  We can see here that, without route summarization, OSPF just advertises all
  the routes. It is the same as if all the routes were in area 0!
</ul></ul></li>
<pre class="terminal">Hat(config)# <b>router ospf 1</b>
Hat(config-router)# <b>network 10.2.1.2 0.0.0.0 area 2</b>
</pre>
<pre class="terminal">
Sock(config)# <b>router ospf 1</b>
Sock(config-router)# <b>network 10.0.0.3 0.0.0.0 area 0</b>
Sock(config-router)# <b>network 10.51.1.1 0.0.0.0 area 51</b>
</pre>
<pre class="terminal">Shoe(config)# <b>router ospf 1</b>
Shoe(config-router)# <b>network 10.51.1.2 0.0.0.0 area 51</b>
</pre>
<pre class="terminal">Hat(config)# <b>interface loopback 0</b>
Hat(config-if)# <b>ip address 10.2.0.1 255.255.255.0</b>
Hat(config-if)# <b>ip ospf network point-to-point</b>
Hat(config-if)# <b>interface loopback 1</b>
Hat(config-if)# <b>ip address 10.2.2.1 255.255.255.0</b>
Hat(config-if)# <b>ip ospf network point-to-point</b>
Hat(config-if)# <b>interface loopback 2</b>
Hat(config-if)# <b>ip address 10.2.3.1 255.255.255.0</b>
Hat(config-if)# <b>ip ospf network point-to-point</b>
Hat(config-if)# <b>interface loopback 3</b>
Hat(config-if)# <b>ip address 10.2.4.1 255.255.255.0</b>
Hat(config-if)# <b>ip ospf network point-to-point</b>
Hat(config-if)# <b>interface loopback 4</b>
Hat(config-if)# <b>ip address 10.2.5.1 255.255.255.0</b>
Hat(config-if)# <b>ip ospf network point-to-point</b>

Hat(config-if)# <b>router ospf 1</b>
Hat(config-router)# <b>network 10.2.0.0 0.0.255.255 area 2</b>
</pre>
<pre class="terminal">Shoe(config)# <b>interface loopback 0</b>
Shoe(config-if)# <b>ip address 10.51.0.1 255.255.255.0</b>
Shoe(config-if)# <b>ip ospf network point-to-point</b>
Shoe(config-if)# <b>interface loopback 1</b>
Shoe(config-if)# <b>ip address 10.51.2.1 255.255.255.0</b>
Shoe(config-if)# <b>ip ospf network point-to-point</b>
Shoe(config-if)# <b>interface loopback 2</b>
Shoe(config-if)# <b>ip address 10.51.3.1 255.255.255.0</b>
Shoe(config-if)# <b>ip ospf network point-to-point</b>
Shoe(config-if)# <b>interface loopback 3</b>
Shoe(config-if)# <b>ip address 10.51.4.1 255.255.255.0</b>
Shoe(config-if)# <b>ip ospf network point-to-point</b>
Shoe(config-if)# <b>interface loopback 4</b>
Shoe(config-if)# <b>ip address 10.51.5.1 255.255.255.0</b>
Shoe(config-if)# <b>ip ospf network point-to-point</b>

Shoe(config-if)# <b>router ospf 1</b>
Shoe(config-router)# <b>network 10.51.0.0 0.0.255.255 area 51</b>
</pre>
<br>
<ul>
  <li>
    The routing table now, without summarization, is pretty long (all the routers
    know all the different networks).
  </li>
  <li>
    Doing multiarea OSPF without summarization has no point.
  </li>
</ul>
<pre class="terminal">Belt# <b>sh ip route</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/8 is variably subnetted, 20 subnets, 2 masks
O IA    10.2.0.0/24 [110/66] via 10.0.0.1, 00:39:46, FastEthernet0/0
O       10.1.3.0/24 [110/65] via 10.1.1.2, 01:23:10, Serial1/0
O IA    10.2.1.0/24 [110/65] via 10.0.0.1, 01:00:32, FastEthernet0/0
O       10.1.2.0/24 [110/65] via 10.1.1.2, 01:23:10, Serial1/0
O IA    10.2.2.0/24 [110/66] via 10.0.0.1, 00:39:46, FastEthernet0/0
C       10.1.1.0/24 is directly connected, Serial1/0
C       10.0.0.0/24 is directly connected, FastEthernet0/0
O IA    10.2.3.0/24 [110/66] via 10.0.0.1, 00:39:47, FastEthernet0/0
O       10.1.0.0/24 [110/65] via 10.1.1.2, 01:23:11, Serial1/0
O IA    10.2.4.0/24 [110/66] via 10.0.0.1, 00:39:47, FastEthernet0/0
O IA    10.2.5.0/24 [110/66] via 10.0.0.1, 00:39:47, FastEthernet0/0
O       10.1.5.0/24 [110/65] via 10.1.1.2, 01:23:11, Serial1/0
O       10.1.4.0/24 [110/65] via 10.1.1.2, 01:23:12, Serial1/0
O IA    10.51.1.0/24 [110/65] via 10.0.0.3, 00:50:10, FastEthernet0/0
O IA    10.51.0.0/24 [110/66] via 10.0.0.3, 00:40:59, FastEthernet0/0
O IA    10.51.3.0/24 [110/66] via 10.0.0.3, 00:40:59, FastEthernet0/0
O IA    10.51.2.0/24 [110/66] via 10.0.0.3, 00:40:59, FastEthernet0/0
O IA    10.51.5.0/24 [110/66] via 10.0.0.3, 00:40:59, FastEthernet0/0
O IA    10.51.4.0/24 [110/66] via 10.0.0.3, 00:40:59, FastEthernet0/0
O IA    10.51.7.1/32 [110/66] via 10.0.0.3, 00:12:48, FastEthernet0/0
</pre>
<br>
<h4><b>[3]</b> Summarization</h4>
<hr>
<ul><li>
  Configure summarization with the area command in ospf configuration
</li></ul>
<pre class="terminal">Belt(config)# <b>router ospf 1</b>
Belt(config-router)# <b>area 1 ?</b>
  authentication  Enable authentication
  default-cost    Set the summary default-cost of a NSSA/stub area
  filter-list     Filter networks between OSPF areas
  nssa            Specify a NSSA area
  range           Summarize routes matching address/mask (border routers only)
  sham-link       Define a sham link and its parameters
  stub            Specify a stub area
  virtual-link    Define a virtual link and its parameters

Belt(config-router)# <b>area 1 range 10.1.0.0 255.255.0.0</b>
</pre>
<pre class="terminal">Tie(config)# <b>router ospf 1</b>
Tie(config-router)# <b>area 2 range 10.2.0.0 255.255.0.0</b>
</pre>
<br>
<ul><li>Now the routing table is better</li></ul>
<pre class="terminal">Sock# <b>sh ip route</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/8 is variably subnetted, 11 subnets, 3 masks
O IA    10.2.0.0/16 [110/65] via 10.0.0.1, 00:00:32, FastEthernet0/0
C       10.0.0.0/24 is directly connected, FastEthernet0/0
O IA    10.1.0.0/16 [110/65] via 10.0.0.2, 00:00:32, FastEthernet0/0
C       10.51.1.0/24 is directly connected, Serial1/0
O       10.51.0.0/24 [110/65] via 10.51.1.2, 00:00:32, Serial1/0
O       10.51.0.0/16 is a summary, 00:00:32, Null0
O       10.51.3.0/24 [110/65] via 10.51.1.2, 00:00:32, Serial1/0
O       10.51.2.0/24 [110/65] via 10.51.1.2, 00:00:33, Serial1/0
O       10.51.5.0/24 [110/65] via 10.51.1.2, 00:00:33, Serial1/0
O       10.51.4.0/24 [110/65] via 10.51.1.2, 00:00:33, Serial1/0
O       10.51.7.1/32 [110/65] via 10.51.1.2, 00:00:33, Serial1/0
</pre>
<br>
<ul>
  <li>
    This configuration works but it prevents you from using any of the
    10.1.0.0, 10.2.0.0, 10.51.0.0 anywhere on your network outside of
    their respective areas. This is wasteful.
  </li>
  <li>
    We can use a custom subnet mask to be more efficient. We will use the
    most specific subnet mask that includes our networks (/21 in this case)
  </li>
</ul>
<pre class="terminal">Belt(config-router)# <b>no area 1 range 10.1.0.0 255.255.0.0</b>
Belt(config-router)# <b>area 1 range 10.1.0.0 255.255.248.0</b>
</pre>
<pre class="terminal">Tie(config-router)# <b>no area 2 range 10.2.0.0 255.255.0.0</b>
Tie(config-router)# <b>area 2 range 10.2.0.0 255.255.248.0</b>
</pre>
<pre class="terminal">Sock(config-router)# <b>no area 51 range 10.51.0.0 255.255.0.0</b>
Sock(config-router)# <b>area 51 range 10.51.0.0 255.255.248.0</b>
</pre>
<br>
<ul><li>Now we could use the rest of the subnets in other areas</li></ul>
<pre class="terminal">Sock# <b>sh ip route</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/8 is variably subnetted, 11 subnets, 3 masks
O IA    10.2.0.0/21 [110/65] via 10.0.0.1, 00:02:36, FastEthernet0/0
C       10.0.0.0/24 is directly connected, FastEthernet0/0
O IA    10.1.0.0/21 [110/65] via 10.0.0.2, 00:02:36, FastEthernet0/0
C       10.51.1.0/24 is directly connected, Serial1/0
O       10.51.0.0/24 [110/65] via 10.51.1.2, 00:02:36, Serial1/0
O       10.51.0.0/21 is a summary, 00:02:36, Null0
O       10.51.3.0/24 [110/65] via 10.51.1.2, 00:02:36, Serial1/0
O       10.51.2.0/24 [110/65] via 10.51.1.2, 00:02:37, Serial1/0
O       10.51.5.0/24 [110/65] via 10.51.1.2, 00:02:37, Serial1/0
O       10.51.4.0/24 [110/65] via 10.51.1.2, 00:02:37, Serial1/0
O       10.51.7.1/32 [110/65] via 10.51.1.2, 00:02:37, Serial1/0
</pre>
<br>
<h4><b>[4, 5]</b> Default routing</h4>
<hr>
<ul><li>
  Configure the loopback interface, the default route and
  make Belt advertise it.
</li></ul>
<pre class="terminal">Belt(config)# <b>interface lo10</b>
Belt(config-if)# <b>ip address 184.51.1.2 255.255.255.0</b>
Belt(config)# <b>ip route 0.0.0.0 0.0.0.0 184.51.1.1</b>
Belt(config)# <b>router ospf 1</b>
Belt(config-router)# <b>default-information originate</b>
</pre>
<br>
<ul><li>
  Verify in other routers
</li></ul>
<pre class="terminal">Tie# <b>sh ip route</b>
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
<br>
<ul>
  <li>
    The router <b>Belt</b> becomes an <b>ASBR</b> (<b>Autonomous
    System Boundary Router</b>).
  </li>
  <li>
    If we <b>shutdown</b> the interface <b>loopback 10</b>, the default
    route will disappear from the routing table. Thus it will stop advertising
    it and the rest of the routers won't have the default route.
  </li>
</ul>
<pre class="terminal">Belt(config)# <b>int lo10</b>
Belt(config-if)# <b>shutdown</b>
</pre>
<pre class="terminal">Tie# <b>sh ip ro</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is not set

     10.0.0.0/8 is variably subnetted, 10 subnets, 2 masks
O       10.2.0.0/24 [110/65] via 10.2.1.2, 00:05:27, Serial1/0
O       10.2.0.0/21 is a summary, 00:05:37, Null0
C       10.2.1.0/24 is directly connected, Serial1/0
O       10.2.2.0/24 [110/65] via 10.2.1.2, 00:05:27, Serial1/0
C       10.0.0.0/24 is directly connected, FastEthernet0/0
O       10.2.3.0/24 [110/65] via 10.2.1.2, 00:05:27, Serial1/0
O IA    10.1.0.0/21 [110/65] via 10.0.0.2, 00:04:55, FastEthernet0/0
O       10.2.4.0/24 [110/65] via 10.2.1.2, 00:05:28, Serial1/0
O       10.2.5.0/24 [110/65] via 10.2.1.2, 00:05:28, Serial1/0
O IA    10.51.0.0/21 [110/65] via 10.0.0.3, 00:05:07, FastEthernet0/0
</pre>
<br>
<ul><li>
  To advertise the route in any case (even if we don't have one or it is down),
  we use <b>always</b>.
</li></ul>
<pre class="terminal">Belt(config)# <b>router ospf 1</b>
Belt(config-router)# <b>default-information originate ?</b>
  always       Always advertise default route
  metric       OSPF default metric
  metric-type  OSPF metric type for default routes
  route-map    Route-map reference

Belt(config-router)# <b>default-information originate always</b>
</pre>
<br>
<ul><li>Check the routing tables now:</li></ul>
<pre class="terminal">Tie# <b>sh ip ro</b>
Codes: C - connected, S - static, R - RIP, M - mobile, B - BGP
       D - EIGRP, EX - EIGRP external, O - OSPF, IA - OSPF inter area
       N1 - OSPF NSSA external type 1, N2 - OSPF NSSA external type 2
       E1 - OSPF external type 1, E2 - OSPF external type 2
       i - IS-IS, su - IS-IS summary, L1 - IS-IS level-1, L2 - IS-IS level-2
       ia - IS-IS inter area, * - candidate default, U - per-user static route
       o - ODR, P - periodic downloaded static route

Gateway of last resort is 10.0.0.2 to network 0.0.0.0

     10.0.0.0/8 is variably subnetted, 10 subnets, 2 masks
O       10.2.0.0/24 [110/65] via 10.2.1.2, 00:09:28, Serial1/0
O       10.2.0.0/21 is a summary, 00:09:38, Null0
C       10.2.1.0/24 is directly connected, Serial1/0
O       10.2.2.0/24 [110/65] via 10.2.1.2, 00:09:28, Serial1/0
C       10.0.0.0/24 is directly connected, FastEthernet0/0
O       10.2.3.0/24 [110/65] via 10.2.1.2, 00:09:28, Serial1/0
O IA    10.1.0.0/21 [110/65] via 10.0.0.2, 00:08:56, FastEthernet0/0
O       10.2.4.0/24 [110/65] via 10.2.1.2, 00:09:29, Serial1/0
O       10.2.5.0/24 [110/65] via 10.2.1.2, 00:09:29, Serial1/0
O IA    10.51.0.0/21 [110/65] via 10.0.0.3, 00:09:07, FastEthernet0/0
O*E2 0.0.0.0/0 [110/1] via 10.0.0.2, 00:01:57, FastEthernet0/0
</pre>
<br>
