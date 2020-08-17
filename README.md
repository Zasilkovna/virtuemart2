# [DEPRECATED] - modul již není udržován/no longer actively maintained

<h1>Modul pro VirtueMart 2</h1>
<h2>Instalace</h2>
<ol style="color: black; ">
  <li><a href="https://github.com/Zasilkovna/virtuemart2/raw/master/releases/zasilkovna-virtuemart2-latest.zip">Stáhnout soubor modulu »</a></li>
  <li>Modul vyžaduje minimálně verzi <b>Joomla 2.5.8 Stable</b> a <b>VirtueMart 2.0.10</b>. Máte-li starší, napište nám prosím používanou verzi a adresu e-shopu na <a href="mailto:technicka.podpora@zasilkovna.cz">technicka.podpora@zasilkovna.cz</a>.</li>
  <li>
    Přihlašte se do administrace Joomly, otevřete nabídku Extensions a Install/Uninstall<br><br>
    <a href="https://cloud.githubusercontent.com/assets/13521096/8906208/f16ecc82-346c-11e5-9865-e629047a083c.jpg"><img src="https://cloud.githubusercontent.com/assets/13521096/8906208/f16ecc82-346c-11e5-9865-e629047a083c.jpg"></a><br><br>
  </li>
  <li>
    Mělo by se zobrazit hlášení o úspěšné instalaci. Nyní je potřeba modul povolit.<br><br>
    <a href="https://cloud.githubusercontent.com/assets/13521096/8906264/7c441376-346d-11e5-963f-b20ccf14a328.png"><img width=500 height=250 src="https://cloud.githubusercontent.com/assets/13521096/8906264/7c441376-346d-11e5-963f-b20ccf14a328.png"></a>
    <br><br>
  </li>
  <li>
    Nastavení hesla API, názvu obchodu, dobírky a další se provede na stránce <b>Components – VirtueMart – Configuration – ZASILKOVNA</b> v panelu Config.<br><br>
    <a href="https://cloud.githubusercontent.com/assets/13521096/8906280/a15cacc2-346d-11e5-9ff4-8fcbbe31725a.png"><img width=600 height=210 src="https://cloud.githubusercontent.com/assets/13521096/8906280/a15cacc2-346d-11e5-9ff4-8fcbbe31725a.png"></a><br><br>
  </li>  
  <li>
    Po nastavení hesla API je potřeba přidat dopravní metody. V <b>Components – VirtueMart – Shop – Shipment Methods</b> přidejte novou dopravní metodu a vyberte <b>Shipment method: Zasilkovna VM2</b><br><br>
    <a href="https://cloud.githubusercontent.com/assets/13521096/8906296/bc135e94-346d-11e5-9d19-881a8e76f535.png"><img width=600 height=369 src="https://cloud.githubusercontent.com/assets/13521096/8906296/bc135e94-346d-11e5-9d19-881a8e76f535.png"></a><br><br>
  </li>
  <li>
    U dopravní metody je ještě potřeba <b>nastavit cenu, daň a cílovou zemi</b> (pokud chcete povolit všechny země, žádnou nevybírejte). Nastavení provedete rozkliknutím dopravní metody v panelu <b>Configuration</b><br><br>
    <a href="https://cloud.githubusercontent.com/assets/13521096/8906309/dadf6106-346d-11e5-945f-5a321f15d5b0.png"><img width=600 height=200 src="https://cloud.githubusercontent.com/assets/13521096/8906309/dadf6106-346d-11e5-945f-5a321f15d5b0.png"></a><br><br>
  </li>
  <li>
    Nyní by měla být zásilkovna nabízena jako další možnost dopravy.   <br><br>
    <a href="https://cloud.githubusercontent.com/assets/13521096/8906327/05f74386-346e-11e5-8493-f58954a92e25.png"><img width=550 height=200 src="https://cloud.githubusercontent.com/assets/13521096/8906327/05f74386-346e-11e5-8493-f58954a92e25.png"></a><br><br>
  </li>
  <li>
    Pokud si přejete <b>omezit některé kombinace doprava-platba</b>, postupujte dle návodu v nastavení modulu (Components - VirtueMart - Configuration - ZASILKOVNA) panel Config dole. Poté můžete v tabulce zaškrtat povolené kombinace.<br><br>
  </li>  
  <li>
    Dále až budete mít nějaké objednávky se způsobem dopravy Zásilkovna, můžete je automaticky podat do systému Zásilkovny, vytisknout štítky nebo exportovat do CSV. To vše se provede v nastavení modulu (Components - VirtueMart - Configuration - ZASILKOVNA) panelu <b>EXPORT</b><br><br>
    <a href="https://cloud.githubusercontent.com/assets/13521096/8906341/24546e6c-346e-11e5-8cce-9cd4452bd87d.png"><img width=550 height=200 src="https://cloud.githubusercontent.com/assets/13521096/8906341/24546e6c-346e-11e5-8cce-9cd4452bd87d.png"></a><br><br>
  </li>
</ol>
<h2>Informace o modulu</h2>
<p>Podporované jazyky:</p>
<ul>
<li>čeština</li>
<li>angličtina</li>
</ul>
<p>Podporované verze:</p>
<ul>
  <li>VirtueMart 2.0.10 a novější</li>
  <li>Joomla! 2.5.8 Stable a novější</li>
  <li>Při problému s použitím v jiné verzi nás kontaktujte na adrese <a href="mailto:technicka.podpora@zasilkovna.cz">technicka.podpora@zasilkovna.cz</a></li>
</ul>
<p>Poskytované funkce:</p>
<ul>
  <li>Instalace typu dopravního modulu Zásilkovna
    <ul>
      <li>možnost rozlišení ceny dle cílové země</li>
      <li>volba typu zobrazení stejná jako v <a href="http://www.zasilkovna.cz/pristup-k-pobockam/pruvodce">průvodci vložením poboček (JS API)</a></li>
      <li>vybraná pobočka se zobrazuje v detailu objednávky v uživatelské (front-office) i administrátorské (back-office) sekci</li>
    </ul>
  </li>
  <li>Možnost exportu souboru s objednávkami
    <ul>
      <li>možnost označit objednávky, export CSV souboru pro hromadné podání zásilek</li>
      <li>vyznačení již exportovaných objednávek</li>
      <li>automatické a manuální označení dobírek</li>
    </ul>
  </li>
  <li>Možnost přímého podání do systému Zásilkovna a tisku štítků</li>  
  <li>Možnost zakázání některých kombinací doprava-platba</li>  
</ul>
