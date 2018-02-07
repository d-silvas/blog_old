<style>
</style>
<!--<img src="../../../assets/images/00setup.png" alt="Setup">-->
<h4 class="subtitle">Setup</h4>
<img src="../../../assets/images/0008.png" alt="Setup">
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
    Ensure BPDUGuard is working correctly - connect switch Mini-Me to the
    network and ensure appropiate action is taken.
  </li>
</ol>
<br>
<h4><b>[1, 2]</b> Root bridge and Portfast configuration</h4>
<hr>
<ul><li>
  Let's make sure Dr Evil is the root bridge first
</li></ul>
<pre class="terminal">DrEvil(config)# <b>spanning-tree vlan 1 root primary</b>
</pre>
<ul><ul><li>
  This command tells the switch "look around, see what else is out there,
  and set your priority lower than everything else".
</li></ul></ul>
<pre class="terminal">DrEvil(config)# <b>int range fa1/0 - 15</b>
DrEvil(config-if-range)# <b>spanning-tree portfast</b>
%Warning: portfast should only be enabled on ports connected to a single host.
 Connecting hubs, concentrators, switches,  bridges, etc.to this interface
 when portfast is enabled, can cause temporary spanning tree loops.
 Use with CAUTION

!One line for each interface...

%Portfast has been configured on FastEthernet1/15 but will only
 have effect when the interface is in a non-trunking mode.
</pre>
<ul><ul><li>
  For security reasons, the portfast config will only work when the interface
  is connected to an end device (it will shutdown in case it receives attempts
  of trunking negotiation)
</li></ul></ul>
<br>
<h4><b>[3]</b> BPDUGuard configuration</h4>
<hr>
<ul>
  <li>
    On some switches we can activate it like this:
  </li>
</ul>
<pre class="terminal">DrEvil(config)# <b>int range fa1/0 - 15</b>
DrEvil(config-if-range)# <b>spanning-tree portfast bpduguard</b>
</pre>
<br>
<ul>
  <li>
    On some other versions:
  </li>
</ul>
<pre class="terminal">DrEvil(config)# <b>int range fa1/0 - 15</b>
DrEvil(config-if-range)# <b>spanning-tree bpduguard enable</b>
</pre>
<br>
<ul>
  <li>
    When the BPDUGuard is activated, the switch thinks "if I see a BPDU coming
    in, I'm going to turn off the interface"
  </li>
  <li>
    Interface will go in an <b>err-disable</b> status. We can check this in
    <b>show interfaces fa1/0</b>.
  </li>
  <li>
    We would need to do <b>shutdown</b> + <b>no shutdown</b> on that interface.
  <li>
    In GNS3, BPDUGuard doesn't work, so no examples.
  </li>
</ul>
