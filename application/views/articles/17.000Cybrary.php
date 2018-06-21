<style>
</style>
<!--<img src="../../../assets/images/00setup.png" alt="Setup">-->
<p>~~Footprinting~~</p>
<h4 class="subtitle"><b>[05]</b> Why sites get hacked </h4>
<ul>
  <li>
    Common attack vectors
    <ul>
      <li>
        XSS: used to inject code onto a website and bypass access controls
      </li>
      <li>
        SQL injection: used to enumerate databases and steal information
      </li>
      <li>
        LFI (local file intrusion): allows an attacker to traverse a file system
      </li>
      <li>
        RFI (remote file inclusion): an attacker can execute a remote file on
        a webserver to steal data
      </li>
      <li>
        URL manipulation: used to gain acces or information from a website
        when poor user controls are in place
      </li>
    </ul>
  </li>
</ul>
<ul>
  <li>
    Methodology: steps for attacking a target
    <ul>
      <li>
        Footprinting: passively gaining information
        <ul>
          <li>
            Ping sweeps: used to identify machines on an ip range that may
            be active
          </li>
          <li>
            Whois: open source information about a company sucha s IP address
            and contact info
          </li>
          <li>
            Google hacking/dorking: uses specialized queries to gain information
          </li>
          <li>
            The internet time machine at archive.org, to view older versions
            of websites
          </li>
        </ul>
      </li>
      <li>
        Scanning: mapping the network
        <ul>
          <li>
            Nmap
          </li>
        </ul>
      </li>
      <li>
        Enumeration: finding vulnerabilities
        <ul>
          <li>
            Nessus
          </li>
          <li>
            Manual identification. Attempting to log into services with
            default credentials
          </li>
          <li>
            Check exploit dataases to identify vulnerable versions of the
            software
          </li>
        </ul>
      </li>
      <li>
        Gaining access: penetrating
        <ul>
          <li>
            Published vulnerabilities for specific pieces of software
          </li>
          <li>
            Services that are using default credentials
          </li>
          <li>
            Users can be targeted to gain access
          </li>
        </ul>
      </li>
      <li>
        Maintaining access: setting up backdoors
      </li>
      <li>
        Covering tracks: altering logs and hiding activity
      </li>
    </ul>
  </li>
</ul>
