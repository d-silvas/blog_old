<style>
</style>
<!--<img src="../../../assets/images/00setup.png" alt="Setup">-->
<h4 class="subtitle">Setup</h4>
<!--<img src="../../../assets/images/0005.png" alt="Setup">-->
<br>
<br>
<h4 class="subtitle">Objectives</h4>
<ol>
  <li>
    Configure Portfast on all non-trunking ports of Dr. Evil.
  </li>
  <li>
    Ensure Dr. Evil is indeed the STP Root Bridge of the network.
  </li>
  <li>
    Protect Dr. Evil from other managed devices by correctly configuring
    BPDUGuard.
  </li>
  <li>
    Ensure BPDUGuard is working correctly - connect Mini-Me to the network
    and
  </li>
  <li>
    Have Belt advertise the default route to the other routes via OSPF.
    The route should exist even if Belt does not have a default route.
  </li>
</ol>
<br>
<h4><b>[1, 2]</b> Root bridge and Portfast configuration</h4>
<hr>
<ul><li>
  Let's make sure Dr Evil is the root bridge first
</li></ul>
<pre class="terminal">DrEvil(config)# <b>spanning-tree vlan 1 root primary
</pre>
<ul><ul><li>
  This command tells the switch "look around, see what else is out there,
  and set your priority lower than everything else".
</li></ul></ul>
<br>
<pre class="terminal">DrEvil(config)#int range fa1/0 - 15
DrEvil(config-if-range)#spanning-tree portfast
%Warning: portfast should only be enabled on ports connected to a single host.
 Connecting hubs, concentrators, switches,  bridges, etc.to this interface
 when portfast is enabled, can cause temporary spanning tree loops.
 Use with CAUTION

!One line for each interface...

%Portfast has been configured on FastEthernet1/15 but will only
 have effect when the interface is in a non-trunking mode.
</pre>
