<style>
  img {
    display: block;
    height: 350px;
    margin: 0 auto;
  }
  .ios-command {
    color: black;
    cursor: pointer;
    font-family: monospace;
  }
  a {
    outline: none;
  }
</style>
<img src="../../../assets/images/00setup.png" alt="Setup">
<p>This is a lab</p>
<div id="accordion" role="tablist">
  <div class="card">
    <div class="card-header" role="tab" id="head-R1">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-R1" role="button" aria-controls="coll-R1">
          R1
        </a>
      </h5>
    </div>
    <div id="coll-R1" class="collapse" role="tabpanel" aria-labelledby="head-R1" data-parent="#accordion">
      <div class="card-body">
        <div id="R1" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-R1-show-run">
              <a data-toggle="collapse" href="#coll-R1-show-run" role="button" aria-controls="coll-R1-show-run">
                <h6 class="mb-0 ios-command">R1# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-R1-show-run" class="collapse" role="tabpanel" aria-labelledby="head-R1-show-run" data-parent="#R1">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 2412 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
service password-encryption
!
hostname R1
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$oBqQ$hRuIxum0VJLgJRYxcGoKX/
!
no aaa new-model
memory-size iomem 5
ip cef
!
!
no ip dhcp use vrf connected
ip dhcp excluded-address 10.24.2.1 10.24.2.99
ip dhcp excluded-address 10.24.2.151 10.24.2.255
ip dhcp excluded-address 10.24.5.151 10.24.5.255
ip dhcp excluded-address 10.24.5.1 10.24.5.99
!
ip dhcp pool IT
   network 10.24.2.0 255.255.255.0
   dns-server 4.2.2.2 8.8.8.8
   default-router 10.24.2.1
!
ip dhcp pool ACCOUNTING
   network 10.24.5.0 255.255.255.0
   dns-server 4.2.2.2 8.8.8.8
   default-router 10.24.5.1
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 ip address 10.24.0.1 255.255.255.0
 ip nat inside
 ip virtual-reassembly
 speed 100
 full-duplex
!
interface FastEthernet0/0.2
 encapsulation dot1Q 2
 ip address 10.24.2.1 255.255.255.0
 ip nat inside
 ip virtual-reassembly
!
interface FastEthernet0/0.5
 encapsulation dot1Q 5
 ip address 10.24.5.1 255.255.255.0
 ip nat inside
 ip virtual-reassembly
!
interface FastEthernet0/1
 no ip address
 shutdown
 duplex auto
 speed auto
!
interface Serial1/0
 ip address 188.23.163.173 255.255.255.248
 ip nat outside
 ip virtual-reassembly
 serial restart-delay 0
!
interface Serial1/1
 no ip address
 shutdown
 serial restart-delay 0
!
interface Serial1/2
 no ip address
 shutdown
 serial restart-delay 0
!
interface Serial1/3
 no ip address
 shutdown
 serial restart-delay 0
!
router rip
 version 2
 network 10.0.0.0
 default-information originate
 no auto-summary
!
ip forward-protocol nd
ip route 0.0.0.0 0.0.0.0 188.23.163.174
!
!
ip http server
no ip http secure-server
ip nat inside source list NATTABLE interface Serial1/0 overload
!
ip access-list standard LIMIT_TELNET
 permit 10.0.0.0 0.255.255.255
 deny   any
ip access-list standard NATTABLE
 permit 10.24.0.0 0.0.0.255
 permit 10.24.2.0 0.0.0.255
 permit 10.24.5.0 0.0.0.255
 deny   any
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C GO OUT ^C
!
line con 0
 exec-timeout 0 0
 privilege level 15
 password 7 094F471A1A0A
 logging synchronous
 login
line aux 0
line vty 0 4
 access-class LIMIT_TELNET in
 password 7 1511021F0725
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R1-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-R1-show-ip-int-br" role="button" aria-controls="coll-R1-show-ip-int-br">
                <h6 class="mb-0 ios-command">R1# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-R1-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-R1-show-ip-int-br" data-parent="#R1">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R1-show-int">
              <a data-toggle="collapse" href="#coll-R1-show-int" role="button" aria-controls="coll-R1-show-int">
                <h6 class="mb-0 ios-command">R1# <b>show interfaces fa0/0</b></h6>
              </a>
            </div>
            <div id="coll-R1-show-int" class="collapse" role="tabpanel" aria-labelledby="head-R1-show-int" data-parent="#R1">
              <div class="card-body">
<pre><code class="language-markup">FastEthernet0/0 is up, line protocol is up
  Hardware is Gt96k FE, address is c202.0b10.0000 (bia c202.0b10.0000)
  Internet address is 10.24.0.1/24
  MTU 1500 bytes, BW 100000 Kbit/sec, DLY 100 usec,
     reliability 255/255, txload 1/255, rxload 1/255
  Encapsulation 802.1Q Virtual LAN, Vlan ID  1., loopback not set
  Keepalive set (10 sec)
  Full-duplex, 100Mb/s, 100BaseTX/FX
  ARP type: ARPA, ARP Timeout 04:00:00
  Last input 00:00:19, output 00:00:04, output hang never
  Last clearing of "show interface" counters never
  Input queue: 0/75/0/0 (size/max/drops/flushes); Total output drops: 0
  Queueing strategy: fifo
  Output queue: 0/40 (size/max)
  5 minute input rate 309000 bits/sec, 33 packets/sec
  5 minute output rate 304000 bits/sec, 33 packets/sec
     98881 packets input, 99801491 bytes
     Received 161 broadcasts, 0 runts, 0 giants, 0 throttles
     0 input errors, 0 CRC, 0 frame, 0 overrun, 0 ignored
     0 watchdog
     0 input packets with dribble condition detected
     99353 packets output, 99546922 bytes, 0 underruns
     0 output errors, 0 collisions, 3 interface resets
     0 babbles, 0 late collision, 0 deferred
     0 lost carrier, 0 no carrier
     0 output buffer failures, 0 output buffers swapped out
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R1-show-ip-route">
              <a data-toggle="collapse" href="#coll-R1-show-ip-route" role="button" aria-controls="coll-R1-show-ip-route">
                <h6 class="mb-0 ios-command">R1# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-R1-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-R1-show-ip-route" data-parent="#R1">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R1-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-R1-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-R1-show-cdp-neigh">
                <h6 class="mb-0 ios-command">R1# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-R1-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-R1-show-cdp-neigh" data-parent="#R1">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          R2
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-R2">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-R2" role="button" aria-controls="coll-R2">
          R2
        </a>
      </h5>
    </div>
    <div id="coll-R2" class="collapse" role="tabpanel" aria-labelledby="head-R2" data-parent="#accordion">
      <div class="card-body">
        <div id="R2" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-R2-show-run">
              <a data-toggle="collapse" href="#coll-R2-show-run" role="button" aria-controls="coll-R2-show-run">
                <h6 class="mb-0 ios-command">R2# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-R2-show-run" class="collapse" role="tabpanel" aria-labelledby="head-R2-show-run" data-parent="#R2">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 1413 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname R2
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$GKc6$z4R/IE.GP41SFIxLPnOnT0
!
no aaa new-model
memory-size iomem 5
ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 ip address 10.24.0.2 255.255.255.0
 speed 100
 full-duplex
!
interface FastEthernet0/1
 no ip address
 shutdown
 duplex auto
 speed auto
!
interface Serial1/0
 ip address 10.15.1.13 255.255.255.252
 serial restart-delay 0
!
interface Serial1/1
 no ip address
 shutdown
 serial restart-delay 0
!
interface Serial1/2
 no ip address
 shutdown
 serial restart-delay 0
!
interface Serial1/3
 no ip address
 shutdown
 serial restart-delay 0
!
router rip
 version 2
 network 10.0.0.0
 no auto-summary
!
ip forward-protocol nd
!
!
ip http server
no ip http secure-server
!
ip access-list standard LIMIT_TELNET
 permit 10.0.0.0 0.255.255.255
 deny   any
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 access-class LIMIT_TELNET in
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R2-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-R2-show-ip-int-br" role="button" aria-controls="coll-R2-show-ip-int-br">
                <h6 class="mb-0 ios-command">R2# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-R2-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-R2-show-ip-int-br" data-parent="#R2">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R2-show-ip-route">
              <a data-toggle="collapse" href="#coll-R2-show-ip-route" role="button" aria-controls="coll-R2-show-ip-route">
                <h6 class="mb-0 ios-command">R2# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-R2-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-R2-show-ip-route" data-parent="#R2">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R2-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-R2-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-R2-show-cdp-neigh">
                <h6 class="mb-0 ios-command">R2# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-R2-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-R2-show-cdp-neigh" data-parent="#R2">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          R3
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-R3">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-R3" role="button" aria-controls="coll-R3">
          R3
        </a>
      </h5>
    </div>
    <div id="coll-R3" class="collapse" role="tabpanel" aria-labelledby="head-R3" data-parent="#accordion">
      <div class="card-body">
        <div id="R3" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-R3-show-run">
              <a data-toggle="collapse" href="#coll-R3-show-run" role="button" aria-controls="coll-R3-show-run">
                <h6 class="mb-0 ios-command">R3# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-R3-show-run" class="collapse" role="tabpanel" aria-labelledby="head-R3-show-run" data-parent="#R3">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 1472 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname R3
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$lvx4$bBrGJDttThUlq3elXWgyk.
!
no aaa new-model
memory-size iomem 5
ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 ip address 10.23.1.1 255.255.255.0
 speed 100
 full-duplex
!
interface FastEthernet0/1
 no ip address
 shutdown
 duplex auto
 speed auto
!
interface Serial1/0
 ip address 10.15.1.14 255.255.255.252
 serial restart-delay 0
!
interface Serial1/1
 no ip address
 shutdown
 serial restart-delay 0
!
interface Serial1/2
 no ip address
 shutdown
 serial restart-delay 0
!
interface Serial1/3
 no ip address
 shutdown
 serial restart-delay 0
!
router rip
 version 2
 passive-interface default
 no passive-interface Serial1/0
 network 10.0.0.0
 no auto-summary
!
ip forward-protocol nd
!
!
ip http server
no ip http secure-server
!
ip access-list standard LIMIT_TELNET
 permit 10.0.0.0 0.255.255.255
 deny   any
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 access-class LIMIT_TELNET in
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R3-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-R3-show-ip-int-br" role="button" aria-controls="coll-R3-show-ip-int-br">
                <h6 class="mb-0 ios-command">R3# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-R3-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-R3-show-ip-int-br" data-parent="#R3">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R3-show-ip-route">
              <a data-toggle="collapse" href="#coll-R3-show-ip-route" role="button" aria-controls="coll-R3-show-ip-route">
                <h6 class="mb-0 ios-command">R3# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-R3-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-R3-show-ip-route" data-parent="#R3">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-R3-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-R3-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-R3-show-cdp-neigh">
                <h6 class="mb-0 ios-command">R3# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-R3-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-R3-show-cdp-neigh" data-parent="#R3">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          ISP
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-ISP">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-ISP" role="button" aria-controls="coll-ISP">
          ISP
        </a>
      </h5>
    </div>
    <div id="coll-ISP" class="collapse" role="tabpanel" aria-labelledby="head-ISP" data-parent="#accordion">
      <div class="card-body">
        <div id="ISP" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-ISP-show-run">
              <a data-toggle="collapse" href="#coll-ISP-show-run" role="button" aria-controls="coll-ISP-show-run">
                <h6 class="mb-0 ios-command">ISP# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-ISP-show-run" class="collapse" role="tabpanel" aria-labelledby="head-ISP-show-run" data-parent="#ISP">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 1353 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname ISP
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$vG8K$rFQXdNB1yQFB4LIQNC0j91
!
no aaa new-model
memory-size iomem 5
ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface Loopback0
 ip address 4.2.2.2 255.255.255.255
!
interface Loopback1
 ip address 8.8.8.8 255.255.255.255
!
interface FastEthernet0/0
 no ip address
 shutdown
 duplex auto
 speed auto
!
interface FastEthernet0/1
 no ip address
 shutdown
 duplex auto
 speed auto
!
interface Serial1/0
 ip address 188.23.163.174 255.255.255.248
 serial restart-delay 0
!
interface Serial1/1
 no ip address
 shutdown
 serial restart-delay 0
!
interface Serial1/2
 no ip address
 shutdown
 serial restart-delay 0
!
interface Serial1/3
 no ip address
 shutdown
 serial restart-delay 0
!
ip forward-protocol nd
!
!
ip http server
no ip http secure-server
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-ISP-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-ISP-show-ip-int-br" role="button" aria-controls="coll-ISP-show-ip-int-br">
                <h6 class="mb-0 ios-command">ISP# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-ISP-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-ISP-show-ip-int-br" data-parent="#ISP">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-ISP-show-ip-route">
              <a data-toggle="collapse" href="#coll-ISP-show-ip-route" role="button" aria-controls="coll-ISP-show-ip-route">
                <h6 class="mb-0 ios-command">ISP# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-ISP-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-ISP-show-ip-route" data-parent="#ISP">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-ISP-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-ISP-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-ISP-show-cdp-neigh">
                <h6 class="mb-0 ios-command">ISP# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-ISP-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-ISP-show-cdp-neigh" data-parent="#ISP">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          S1
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-S1">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-S1" role="button" aria-controls="coll-S1">
          S1
        </a>
      </h5>
    </div>
    <div id="coll-S1" class="collapse" role="tabpanel" aria-labelledby="head-S1" data-parent="#accordion">
      <div class="card-body">
        <div id="S1" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-S1-show-run">
              <a data-toggle="collapse" href="#coll-S1-show-run" role="button" aria-controls="coll-S1-show-run">
                <h6 class="mb-0 ios-command">S1# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-S1-show-run" class="collapse" role="tabpanel" aria-labelledby="head-S1-show-run" data-parent="#S1">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 1781 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname S1
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$WKhV$7aJJ8pNFlOoN682GiuYb60
!
no aaa new-model
memory-size iomem 5
no ip routing
no ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 no ip address
 no ip route-cache
 shutdown
 duplex auto
 speed auto
!
interface FastEthernet0/1
 no ip address
 no ip route-cache
 shutdown
 duplex auto
 speed auto
!
interface FastEthernet1/0
 switchport mode trunk
 duplex full
 speed 100
!
interface FastEthernet1/1
 switchport trunk allowed vlan 1,2,5,1002-1005
 switchport mode trunk
 duplex full
 speed 100
!
interface FastEthernet1/2
 switchport trunk allowed vlan 1,2,5,1002-1005
 switchport mode trunk
 duplex full
 speed 100
!
interface FastEthernet1/3
!
interface FastEthernet1/4
!
interface FastEthernet1/5
!
interface FastEthernet1/6
!
interface FastEthernet1/7
!
interface FastEthernet1/8
!
interface FastEthernet1/9
!
interface FastEthernet1/10
!
interface FastEthernet1/11
!
interface FastEthernet1/12
!
interface FastEthernet1/13
!
interface FastEthernet1/14
!
interface FastEthernet1/15
!
interface Vlan1
 ip address 10.24.0.11 255.255.255.0
 no ip route-cache
!
ip default-gateway 10.24.0.1
ip forward-protocol nd
!
!
ip http server
no ip http secure-server
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S1-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-S1-show-ip-int-br" role="button" aria-controls="coll-S1-show-ip-int-br">
                <h6 class="mb-0 ios-command">S1# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-S1-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-S1-show-ip-int-br" data-parent="#S1">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S1-show-ip-route">
              <a data-toggle="collapse" href="#coll-S1-show-ip-route" role="button" aria-controls="coll-S1-show-ip-route">
                <h6 class="mb-0 ios-command">S1# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-S1-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-S1-show-ip-route" data-parent="#S1">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S1-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-S1-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-S1-show-cdp-neigh">
                <h6 class="mb-0 ios-command">S1# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-S1-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-S1-show-cdp-neigh" data-parent="#S1">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          S2
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-S2">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-S2" role="button" aria-controls="coll-S2">
          S2
        </a>
      </h5>
    </div>
    <div id="coll-S2" class="collapse" role="tabpanel" aria-labelledby="head-S2" data-parent="#accordion">
      <div class="card-body">
        <div id="S2" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-S2-show-run">
              <a data-toggle="collapse" href="#coll-S2-show-run" role="button" aria-controls="coll-S2-show-run">
                <h6 class="mb-0 ios-command">S2# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-S2-show-run" class="collapse" role="tabpanel" aria-labelledby="head-S2-show-run" data-parent="#S2">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 1742 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname S2
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$zKBH$6SLIyKYPgqC7EzbMIdMJH.
!
no aaa new-model
memory-size iomem 5
no ip routing
no ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 no ip address
 no ip route-cache
 shutdown
 duplex auto
 speed auto
!
interface FastEthernet0/1
 no ip address
 no ip route-cache
 shutdown
 duplex auto
 speed auto
!
interface FastEthernet1/0
 switchport trunk allowed vlan 1,2,5,1002-1005
 switchport mode trunk
 duplex full
 speed 100
!
interface FastEthernet1/1
 switchport access vlan 2
 duplex full
 speed 100
!
interface FastEthernet1/2
!
interface FastEthernet1/3
!
interface FastEthernet1/4
!
interface FastEthernet1/5
!
interface FastEthernet1/6
!
interface FastEthernet1/7
!
interface FastEthernet1/8
!
interface FastEthernet1/9
!
interface FastEthernet1/10
!
interface FastEthernet1/11
!
interface FastEthernet1/12
!
interface FastEthernet1/13
!
interface FastEthernet1/14
!
interface FastEthernet1/15
!
interface Vlan1
 ip address 10.24.0.12 255.255.255.0
 no ip route-cache
!
interface Vlan2
 no ip address
 no ip route-cache
!
ip default-gateway 10.24.0.1
ip forward-protocol nd
!
!
ip http server
no ip http secure-server
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S2-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-S2-show-ip-int-br" role="button" aria-controls="coll-S2-show-ip-int-br">
                <h6 class="mb-0 ios-command">S2# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-S2-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-S2-show-ip-int-br" data-parent="#S2">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S2-show-ip-route">
              <a data-toggle="collapse" href="#coll-S2-show-ip-route" role="button" aria-controls="coll-S2-show-ip-route">
                <h6 class="mb-0 ios-command">S2# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-S2-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-S2-show-ip-route" data-parent="#S2">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S2-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-S2-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-S2-show-cdp-neigh">
                <h6 class="mb-0 ios-command">S2# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-S2-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-S2-show-cdp-neigh" data-parent="#S2">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          S3
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-S3">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-S3" role="button" aria-controls="coll-S3">
          S3
        </a>
      </h5>
    </div>
    <div id="coll-S3" class="collapse" role="tabpanel" aria-labelledby="head-S3" data-parent="#accordion">
      <div class="card-body">
        <div id="S3" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-S3-show-run">
              <a data-toggle="collapse" href="#coll-S3-show-run" role="button" aria-controls="coll-S3-show-run">
                <h6 class="mb-0 ios-command">S3# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-S3-show-run" class="collapse" role="tabpanel" aria-labelledby="head-S3-show-run" data-parent="#S3">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 1714 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname S3
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$cQXn$0TK0wQj.IS5m0NrgcmRaI/
!
no aaa new-model
memory-size iomem 5
no ip routing
no ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 no ip address
 no ip route-cache
 shutdown
 duplex auto
 speed auto
!
interface FastEthernet0/1
 no ip address
 no ip route-cache
 shutdown
 duplex auto
 speed auto
!
interface FastEthernet1/0
 switchport trunk allowed vlan 1,2,5,1002-1005
 switchport mode trunk
 duplex full
 speed 100
!
interface FastEthernet1/1
 switchport access vlan 5
 duplex full
 speed 100
!
interface FastEthernet1/2
 duplex full
 speed 100
!
interface FastEthernet1/3
!
interface FastEthernet1/4
!
interface FastEthernet1/5
!
interface FastEthernet1/6
!
interface FastEthernet1/7
!
interface FastEthernet1/8
!
interface FastEthernet1/9
!
interface FastEthernet1/10
!
interface FastEthernet1/11
!
interface FastEthernet1/12
!
interface FastEthernet1/13
!
interface FastEthernet1/14
!
interface FastEthernet1/15
!
interface Vlan1
 ip address 10.24.0.13 255.255.255.0
 no ip route-cache
!
ip default-gateway 10.24.0.1
ip forward-protocol nd
!
!
ip http server
no ip http secure-server
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S3-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-S3-show-ip-int-br" role="button" aria-controls="coll-S3-show-ip-int-br">
                <h6 class="mb-0 ios-command">S3# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-S3-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-S3-show-ip-int-br" data-parent="#S3">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S3-show-ip-route">
              <a data-toggle="collapse" href="#coll-S3-show-ip-route" role="button" aria-controls="coll-S3-show-ip-route">
                <h6 class="mb-0 ios-command">S3# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-S3-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-S3-show-ip-route" data-parent="#S3">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-S3-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-S3-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-S3-show-cdp-neigh">
                <h6 class="mb-0 ios-command">S3# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-S3-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-S3-show-cdp-neigh" data-parent="#S3">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          PC-A
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-PC-A">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-PC-A" role="button" aria-controls="coll-PC-A">
          PC-A
        </a>
      </h5>
    </div>
    <div id="coll-PC-A" class="collapse" role="tabpanel" aria-labelledby="head-PC-A" data-parent="#accordion">
      <div class="card-body">
        <div id="PC-A" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-A-show-run">
              <a data-toggle="collapse" href="#coll-PC-A-show-run" role="button" aria-controls="coll-PC-A-show-run">
                <h6 class="mb-0 ios-command">PC-A# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-PC-A-show-run" class="collapse" role="tabpanel" aria-labelledby="head-PC-A-show-run" data-parent="#PC-A">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 982 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname PC-A
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$BJPo$futzdeIYP.EvpReHOlhKn.
!
no aaa new-model
memory-size iomem 5
no ip routing
no ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 ip address dhcp
 no ip route-cache
 speed 100
 full-duplex
!
interface FastEthernet0/1
 no ip address
 no ip route-cache
 shutdown
 duplex auto
 speed auto
!
ip forward-protocol nd
!
!
ip http server
no ip http secure-server
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-A-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-PC-A-show-ip-int-br" role="button" aria-controls="coll-PC-A-show-ip-int-br">
                <h6 class="mb-0 ios-command">PC-A# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-PC-A-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-PC-A-show-ip-int-br" data-parent="#PC-A">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-A-show-ip-route">
              <a data-toggle="collapse" href="#coll-PC-A-show-ip-route" role="button" aria-controls="coll-PC-A-show-ip-route">
                <h6 class="mb-0 ios-command">PC-A# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-PC-A-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-PC-A-show-ip-route" data-parent="#PC-A">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-A-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-PC-A-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-PC-A-show-cdp-neigh">
                <h6 class="mb-0 ios-command">PC-A# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-PC-A-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-PC-A-show-cdp-neigh" data-parent="#PC-A">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          PC-B
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-PC-B">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-PC-B" role="button" aria-controls="coll-PC-B">
          PC-B
        </a>
      </h5>
    </div>
    <div id="coll-PC-B" class="collapse" role="tabpanel" aria-labelledby="head-PC-B" data-parent="#accordion">
      <div class="card-body">
        <div id="PC-B" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-B-show-run">
              <a data-toggle="collapse" href="#coll-PC-B-show-run" role="button" aria-controls="coll-PC-B-show-run">
                <h6 class="mb-0 ios-command">PC-B# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-PC-B-show-run" class="collapse" role="tabpanel" aria-labelledby="head-PC-B-show-run" data-parent="#PC-B">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 982 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname PC-B
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$WZ7Z$G0VmnawWDUVYZdBhL2Dm20
!
no aaa new-model
memory-size iomem 5
no ip routing
no ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 ip address dhcp
 no ip route-cache
 speed 100
 full-duplex
!
interface FastEthernet0/1
 no ip address
 no ip route-cache
 shutdown
 duplex auto
 speed auto
!
ip forward-protocol nd
!
!
ip http server
no ip http secure-server
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-B-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-PC-B-show-ip-int-br" role="button" aria-controls="coll-PC-B-show-ip-int-br">
                <h6 class="mb-0 ios-command">PC-B# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-PC-B-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-PC-B-show-ip-int-br" data-parent="#PC-B">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-B-show-ip-route">
              <a data-toggle="collapse" href="#coll-PC-B-show-ip-route" role="button" aria-controls="coll-PC-B-show-ip-route">
                <h6 class="mb-0 ios-command">PC-B# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-PC-B-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-PC-B-show-ip-route" data-parent="#PC-B">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-B-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-PC-B-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-PC-B-show-cdp-neigh">
                <h6 class="mb-0 ios-command">PC-B# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-PC-B-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-PC-B-show-cdp-neigh" data-parent="#PC-B">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
  <!--*************************************************
  *
  *          PC-C
  *
  ---------------------------------------------------->
  <div class="card">
    <div class="card-header" role="tab" id="head-PC-C">
      <h5 class="mb-0">
        <a data-toggle="collapse" href="#coll-PC-C" role="button" aria-controls="coll-PC-C">
          PC-C
        </a>
      </h5>
    </div>
    <div id="coll-PC-C" class="collapse" role="tabpanel" aria-labelledby="head-PC-C" data-parent="#accordion">
      <div class="card-body">
        <div id="PC-C" role="tablist">
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-C-show-run">
              <a data-toggle="collapse" href="#coll-PC-C-show-run" role="button" aria-controls="coll-PC-C-show-run">
                <h6 class="mb-0 ios-command">PC-C# <b>show running-config</b></h6>
              </a>
            </div>
            <div id="coll-PC-C-show-run" class="collapse" role="tabpanel" aria-labelledby="head-PC-C-show-run" data-parent="#PC-C">
              <div class="card-body">
<pre><code class="language-markup">Current configuration : 982 bytes
!
version 12.4
service timestamps debug datetime msec
service timestamps log datetime msec
no service password-encryption
!
hostname PC-C
!
boot-start-marker
boot-end-marker
!
enable secret 5 $1$igXh$vZas39WaWknje9tpzl7xv1
!
no aaa new-model
memory-size iomem 5
ip cef
!
!
!
!
no ip domain lookup
!
multilink bundle-name authenticated
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
!
archive
 log config
  hidekeys
!
!
!
!
!
!
!
!
interface FastEthernet0/0
 ip address 10.23.1.10 255.255.255.0
 speed 100
 full-duplex
!
interface FastEthernet0/1
 no ip address
 shutdown
 duplex auto
 speed auto
!
ip forward-protocol nd
ip route 0.0.0.0 0.0.0.0 10.23.1.1
!
!
ip http server
no ip http secure-server
!
!
!
!
!
!
!
control-plane
!
!
!
!
!
!
!
!
!
banner motd ^C

****************************

>>>  YOU SHALL NOT PASS  <<<

****************************

^C
!
line con 0
 exec-timeout 0 0
 password cisco
 logging synchronous
 login
line aux 0
line vty 0 4
 password cisco
 login
!
!
end
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-C-show-ip-int-br">
              <a data-toggle="collapse" href="#coll-PC-C-show-ip-int-br" role="button" aria-controls="coll-PC-C-show-ip-int-br">
                <h6 class="mb-0 ios-command">PC-C# <b>show ip interface brief</b></h6>
              </a>
            </div>
            <div id="coll-PC-C-show-ip-int-br" class="collapse" role="tabpanel" aria-labelledby="head-PC-C-show-ip-int-br" data-parent="#PC-C">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-C-show-ip-route">
              <a data-toggle="collapse" href="#coll-PC-C-show-ip-route" role="button" aria-controls="coll-PC-C-show-ip-route">
                <h6 class="mb-0 ios-command">PC-C# <b>show ip route</b></h6>
              </a>
            </div>
            <div id="coll-PC-C-show-ip-route" class="collapse" role="tabpanel" aria-labelledby="head-PC-C-show-ip-route" data-parent="#PC-C">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
          <div class="card">
            <div class="card-header" role="tab" id="head-PC-C-show-cdp-neigh">
              <a data-toggle="collapse" href="#coll-PC-C-show-cdp-neigh" role="button" aria-expanded="true" aria-controls="coll-PC-C-show-cdp-neigh">
                <h6 class="mb-0 ios-command">PC-C# <b>show cdp neighbors</b></h6>
              </a>
            </div>
            <div id="coll-PC-C-show-cdp-neigh" class="collapse" role="tabpanel" aria-labelledby="head-PC-C-show-cdp-neigh" data-parent="#PC-C">
              <div class="card-body">
<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
</code></pre>
              </div>
            </div>
          </div>
          <!---------------------------------------->
        </div>
      </div>
    </div>
  </div>
</div><!-- /accordion -->





<br><br><br>

<pre><code class="language-markup">Codes: R - RIP derived, O - OSPF derived,
       C - connected, S - static, B - BGP derived,
       * - candidate default route, IA - OSPF inter area route,
       i - IS-IS derived, ia - IS-IS, U - per-user static route,
       o - on-demand routing, M - mobile, P - periodic downloaded static route,
       D - EIGRP, EX - EIGRP external, E1 - OSPF external type 1 route,
       E2 - OSPF external type 2 route, N1 - OSPF NSSA external type 1 route,
       N2 - OSPF NSSA external type 2 route

Gateway of last resort is 10.119.254.240 to network 10.140.0.0

O E2 10.110.0.0 [160/5] via 10.119.254.6, 0:01:00, Ethernet2
E    10.67.10.0 [200/128] via 10.119.254.244, 0:02:22, Ethernet2
O E2 10.68.132.0 [160/5] via 10.119.254.6, 0:00:59, Ethernet2
O E2 10.130.0.0 [160/5] via 10.119.254.6, 0:00:59, Ethernet2
E    10.128.0.0 [200/128] via 10.119.254.244, 0:02:22, Ethernet2
E    10.129.0.0 [200/129] via 10.119.254.240, 0:02:22, Ethernet2
E    10.65.129.0 [200/128] via 10.119.254.244, 0:02:22, Ethernet2
E    10.10.0.0 [200/128] via 10.119.254.244, 0:02:22, Ethernet2
E    10.75.139.0 [200/129] via 10.119.254.240, 0:02:23, Ethernet2
E    10.16.208.0 [200/128] via 10.119.254.244, 0:02:22, Ethernet2
E    10.84.148.0 [200/129] via 10.119.254.240, 0:02:23, Ethernet2
E    10.31.223.0 [200/128] via 10.119.254.244, 0:02:22, Ethernet2
E    10.44.236.0 [200/129] via 10.119.254.240, 0:02:23, Ethernet2
E    10.141.0.0 [200/129] via 10.119.254.240, 0:02:22, Ethernet2
E    10.140.0.0 [200/129] via 10.119.254.240, 0:02:23, Ethernet2
</code></pre>
