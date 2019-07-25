<?php
function prettyRank($rankVal) {
  switch($rankVal) {
    case "12":
      return '<span style="color: #fff">[</span><span style="color: #AA00AA">Developer</span><span style="color: #fff">]</span>';
    case "11":
      return '<span style="color: #fff">[</span><span style="color: #55FF55">Manager</span><span style="color: #fff">]</span>';
    case "10":
      return '<span style="color: #fff">[</span><span style="color: #FF5555">Coordinator</span><span style="color: #fff">]</span>';
    case "9.5":
      return '<span style="color: #fff">[</span><span style="color: #00AAAA">Cast Member</span><span style="color: #fff">]</span>';
    case "9":
      return '<span style="color: #fff">[</span><span style="color: #00AAAA">Cast Member</span><span style="color: #fff">]</span>';
    case "8":
      return '<span style="color: #fff">[</span><span style="color: #AA00AA">Photopass</span><span style="color: #fff">]</span>';
    case "7":
      return '<span style="color: #fff">[</span><span style="color: #FFAA00">Character</span><span style="color: #fff">]</span>';
    case "6":
      return '<span style="color: #fff">[</span><span style="color: #AA0000">Security</span><span style="color: #fff">]</span>';
    case "5":
      return '<span style="color: #000">[</span><span style="color: #AA0000">Special Guest</span><span style="color: #000">]</span>';
    case "4":
      return '<span style="color: #fff">[</span><span style="color: #FFAA00">Platinum+</span><span style="color: #fff">]</span>';
    case "3":
      return '<span style="color: #fff">[</span><span style="color: #FFAA00">Platinum</span><span style="color: #fff">]</span>';
    case "2":
      return '<span style="color: #fff">[</span><span style="color: #FFAA00">Gold</span><span style="color: #fff">]</span>';
    case "1":
      return '<span style="color: #fff">[</span><span style="color: #FFAA00">Silver</span><span style="color: #fff">]</span>';
    case "0":
      return '<span style="color: #fff">[</span><span style="color: #FFFF55">Guest</span><span style="color: #fff">]</span>';
    default:
      return '<span style="color: #fff">[</span><span style="color: #FFFF55">Guest</span><span style="color: #fff">]</span>';
  }
}
 ?>
