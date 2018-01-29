<style>
img {
  display:block;
  margin: 0 auto 5px auto;
}
</style>
<h4 class="subtitle">Setup</h4>
<img src="../../../assets/images/0006.png" alt="Setup">
<br>
<br>
<h4 class="subtitle">Objectives</h4>
<ol>
  <li>
    Ensure switches have a basic configuration and connect as shown.
  </li>
  <li>
    Use the proper show commands to determine the version of STP running,
    port status, and identify the Root Bridge.
  </li>
  <li>
    Cause a Root Port outage; determine how long it takes to converge.
  </li>
  <li>
    Change all switches to use RSTP test the outage again.
  </li>
  <li>
    Modify the bridge priority to elect S1 as the Root Bridge,
    S2 as the Backup Root; diagram port results and verify your
    assumptions are correct on the switch.
  </li>
</ol>
<br>
<h4><b>[1]</b> Basic configuration</h4>
<hr>
<ul><li>
  Use <b>show cdp neighbors</b> to verify the connections (very useful
  in real world setups). You can see your interface and their interface.
</li></ul>
<pre class="terminal">S1# <b>show cdp neighbors</b>
Capability Codes: R - Router, T - Trans Bridge, B - Source Route Bridge
                  S - Switch, H - Host, I - IGMP, r - Repeater

Device ID        Local Intrfce     Holdtme    Capability  Platform  Port ID
S3               Fas 1/3            176          S I      3725      Fas 1/0
S2               Fas 1/2            152          S I      3725      Fas 1/0
S5               Fas 1/5            127          S I      3725      Fas 1/0
S4               Fas 1/4            173          S I      3725      Fas 1/0
</pre>
<br>
<h4><b>[2]</b> Default STP verification</h4>
<hr>
<ul><li>
  Use <b>show spanning-tree</b> to check the current config. In GNS3
  we have to use <b>brief</b> to obtain a similar output (switching
  doesn't work so well).
</li></ul>
<pre class="terminal">S1# <b>show spanning-tree brief</b>
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
</pre>
<img src="../../../assets/images/0007.png" alt="Show spanning tree">
<br>
<ul>
  <li>
    Here (<b>show spanning tree</b> on a real switch) we can see:
    <ul>
      <li>
        Protocol in use: <b>ieee</b> is the plain old Common Spanning Tree,
        but in Cisco devices is PVSTP.
      </li>
      <li>
        Information about the Root Bridge. Cost 19 means our router is not
        the Root Bridge. Also shows which port we have to exit in order to
        reach the Root.
      </li>
      <li>
        Information about the local switch
      </li>
      <li>
        Interface status: root/designated ports, port status (forwarding/blocked).
      </li>
    </ul>
  </li>
  <li>
    In our setup, it looks like S5 is the root. We can confirm using the
    same command. In a real switch we would see all <b>Designated</b> ports.
  </li>
</ul>
<pre class="terminal">S5# <b>show spanning-tree brief</b>
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
<h4><b>[3]</b> Convergence after a root port outage</h4>
<hr>
<ul><li>
  Shut down the root interface on S1.
</li></ul>
<pre class="terminal">S1(config)# <b>interface fa1/5</b>
S1(config-if)# <b>shutdown</b>
</pre>
<br>
<ul><li>
  Check <b>show spanning tree</b> to see which states the new root interface
  candidate goes through: <b>LIS</b> (listening), <b>LRN</b> (learning) and
  <b>FWD</b> (forward).
</li></ul>
<pre class="terminal">S1# <b>show spanning-tree brief</b>
VLAN1
  Spanning tree enabled protocol ieee
  Root ID    Priority    32768
             Address     c205.0971.0000
             Cost        38
             Port        43 (FastEthernet1/2)
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec

  Bridge ID  Priority    32768
             Address     c207.0961.0000
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec
             Aging Time 300

Interface                                   Designated
Name                 Port ID Prio Cost  Sts Cost  Bridge ID            Port ID
-------------------- ------- ---- ----- --- ----- -------------------- -------
FastEthernet1/2      128.43   128    19 LIS    19 32768 c206.0961.0000 128.41
FastEthernet1/3      128.44   128    19 FWD    38 32768 c207.0961.0000 128.44
FastEthernet1/4      128.45   128    19 FWD    38 32768 c207.0961.0000 128.45
</pre>
<pre class="terminal">S1# <b>show spanning-tree brief</b>
VLAN1
  Spanning tree enabled protocol ieee
  Root ID    Priority    32768
             Address     c205.0971.0000
             Cost        38
             Port        43 (FastEthernet1/2)
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec

  Bridge ID  Priority    32768
             Address     c207.0961.0000
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec
             Aging Time 300

Interface                                   Designated
Name                 Port ID Prio Cost  Sts Cost  Bridge ID            Port ID
-------------------- ------- ---- ----- --- ----- -------------------- -------
FastEthernet1/2      128.43   128    19 LRN    19 32768 c206.0961.0000 128.41
FastEthernet1/3      128.44   128    19 FWD    38 32768 c207.0961.0000 128.44
FastEthernet1/4      128.45   128    19 FWD    38 32768 c207.0961.0000 128.45
</pre>
<pre class="terminal">S1# <b>show spanning-tree brief</b>
VLAN1
  Spanning tree enabled protocol ieee
  Root ID    Priority    32768
             Address     c205.0971.0000
             Cost        38
             Port        43 (FastEthernet1/2)
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec

  Bridge ID  Priority    32768
             Address     c207.0961.0000
             Hello Time   2 sec  Max Age 20 sec  Forward Delay 15 sec
             Aging Time 300

Interface                                   Designated
Name                 Port ID Prio Cost  Sts Cost  Bridge ID            Port ID
-------------------- ------- ---- ----- --- ----- -------------------- -------
FastEthernet1/2      128.43   128    19 FWD    19 32768 c206.0961.0000 128.41
FastEthernet1/3      128.44   128    19 FWD    38 32768 c207.0961.0000 128.44
FastEthernet1/4      128.45   128    19 FWD    38 32768 c207.0961.0000 128.45
</pre>
<br>
<ul>
  <li>Each of this states has a fixed time in STP. The total time is 30sec:
    <ul>
      <li>
        LIS (listening): 15 seconds. It's listening for BPDUs from other
        switches in the network.
      </li>
      <li>
        LRN (learning): 15 seconds. It's learning MAC addresses. This gives the
        switch time to learn how the network looks like.
      </li>
    </ul>
  </li>
</ul>
<br>
<h4><b>[4]</b> RSTP</h4>
<hr>
<ul><li>
  RSTP doesn't work in GNS3, but this would be the command to enable it on
  real switches (we should do it on all of them):
</li></ul>
<pre class="terminal">S1(config)# <b>spanning-tree mode rapid-pvst</b>
</pre>
<ul>
  <ul>
    <li>
      In a normal switch we would see <b>Spanning tree enabled protocol rstp</b>
      in the output of the <b>show spanning-tree</b> command.
    </li>
    <li>
      This protocol takes about 2sec to converge. Normal spanning tree is passive,
      and rapid spanning tree is active.
    </li>
  </ul>
</ul>
<br>
<h4><b>[4]</b> Manually assigning the Root Bridge</h4>
<hr>
<ul><li>
  KK
</li></ul>
<pre class="terminal">
</pre>
