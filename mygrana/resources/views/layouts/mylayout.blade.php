<!DOCTYPE html>
<html >
<head>
  <title>@yield('titulo')</title>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
  <link rel="stylesheet" href="https://www.w3schools.com/lib/w3-theme-green.css">
  <!-- W3Schools
  Copyright Information
All pages and graphics on this web site are the property of the company Refsnes Data.

Pages, code or other content from W3Schools may not be redistributed or reproduced in any way, shape, or form without the written permission of Refsnes Data.

Failure to do so is a violation of copyright laws.

Using W3Schools in Teaching
Fair use includes using copyrighted material in teaching under this balancing:

Favorable Use:
Copying examples and code snippets for non-profit teaching and research.
Copying small quantities, appropriate for classroom teaching.
Not Favorable Use:
Copying for profitable or commercial use.
Massive or verbatim copying.
Copying large quantities.
 -->
  <link rel='stylesheet' href='https://fonts.googleapis.com/css?family=Open+Sans'>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <!-- In the Font Awesome Free download, the SIL OLF license applies to all icons packaged as web and desktop font files. -->
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <!-- Bootstrap is released under the MIT license and is copyright 2018 Twitter. Boiled down to smaller chunks, it can be described with the following conditions.

It requires you to:
Keep the license and copyright notice included in Bootstrap’s CSS and JavaScript files when you use them in your works
It permits you to:
Freely download and use Bootstrap, in whole or in part, for personal, private, company internal, or commercial purposes
Use Bootstrap in packages or distributions that you create
Modify the source code
Grant a sublicense to modify and distribute Bootstrap to third parties not included in the license
It forbids you to:
Hold the authors and license owners liable for damages as Bootstrap is provided without warranty
Hold the creators or copyright holders of Bootstrap liable
Redistribute any piece of Bootstrap without proper attribution
Use any marks owned by Twitter in any way that might state or imply that Twitter endorses your distribution
Use any marks owned by Twitter in any way that might state or imply that you created the Twitter software in question
It does not require you to:
Include the source of Bootstrap itself, or of any modifications you may have made to it, in any redistribution you may assemble that includes it
Submit changes that you make to Bootstrap back to the Bootstrap project (though such feedback is encouraged)-->
  <style>
  html,body,h1,h2,h3,h4,h5 {font-family: "Open Sans", sans-serif}
  </style>
</head>
<body>
  <!-- Navbar -->
  <div class="w3-top">
    <div class="w3-bar w3-theme-d2 w3-left-align w3-large">
      <a href="/" class="w3-bar-item w3-button w3-padding-large w3-theme-d4"><i class="fa fa-home w3-margin-right"></i>MyGrana</a>

      <div class="w3-dropdown-hover w3-right">
        <button class="w3-button w3-padding-large" title="Notifications"><img src="@yield('imgsrc')" class="w3-circle" style="height:23px;width:23px" alt="Foto"></button>
        <div class="w3-dropdown-content w3-card-4 w3-bar-block" style="width:300px">
          <form id="logout-form" action="{{ route('logout') }}" method="POST">
                @csrf
                <Button class="w3-button" type="submit" name="logout" value="logout" >Logout</Button>
            </form>
        </div>
      </div>
    </div>
  </div>


  <!-- Page Container -->
  <div class="w3-container w3-content" style="max-width:1400px;margin-top:80px">
    <!-- The Grid -->
    <div class="w3-row">
      <!-- Left Column -->
      <div class="w3-col m3">
        <!-- Profile -->
        <div class="w3-card w3-round w3-white">
          <div class="w3-container">
            <h4 class="w3-center">@yield('userName')</h4>
            <p class="w3-center"><img src="@yield('imgsrc')" class="w3-circle" style="height:106px;width:106px" alt="Foto"></p>
            <hr>
            <p><i class="fa fa-plus fa-fw w3-margin-right w3-text-theme"></i> <strong class="w3-text-theme">@yield('Rendas')</strong></p>
            <p><i class="fa fa-minus fa-fw w3-margin-right w3-text-red"></i> <strong class="w3-text-red"> @yield('Gastos') </strong></p>
            <p><i class="fa @yield('LiquidoIcone') fa-fw w3-margin-right @yield('LiquidoCorIcone')"></i> <strong class="@yield('LiquidoCorValor')"> @yield('LiquidoValor') </strong></p>
          </div>
        </div>
        <br>

        <!-- Accordion -->
        <div class="w3-card w3-round">
          <div class="w3-white">
            <button onclick="adicionarTransacao('adicionarGasto','adicionarRenda')" class="w3-button w3-block w3-theme-l1 w3-left-align"><i class="fa fa-plus fa-fw w3-margin-right"></i>Adicionar Transação</button>
            <div id="adicionarGasto" class="w3-hide w3-container">
              <p><a class="w3-text-black" href="{{ route('transacao.create', 'gasto' ) }}">Adicionar Gasto</a></p>
            </div>
            <div id="adicionarRenda" class="w3-hide w3-container">
              <p><a class="w3-text-black" href="{{ route('transacao.create', 'renda') }}">Adicionar Renda</a></p>
            </div>
            <form action="{{ route('transacao.index') }}">
              <button name="listar" class="w3-button w3-block w3-theme-l1 w3-left-align" type="submit" value"Listar Gastos">
                <i class="fa fa-list-ul fa-fw w3-margin-right"></i>Listar Gastos e Rendas</button>
            </form>
            <form action="{{ route('addPic') }}">
              <button name="listar" class="w3-button w3-block w3-theme-l1 w3-left-align" type="submit" value"Listar Gastos">
                <i class="fa fa-image fa-fw w3-margin-right"></i>Mudar Foto de Perfil</button>
            </form>

          </div>
        </div>
        <br>


        <!-- End Left Column -->
      </div>

      <!-- Middle Column -->
      @yield('content')


      <!-- End Grid -->
    </div>

    <!-- End Page Container -->
  </div>
  <br>


  <script>
  // Accordion
  function adicionarTransacao(id1,id2) {
    var x = document.getElementById(id1);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
      x.previousElementSibling.className += " w3-theme-d1";
    } else {
      x.className = x.className.replace("w3-show", "");
      x.previousElementSibling.className =
      x.previousElementSibling.className.replace(" w3-theme-d1", "");
    }
    x = document.getElementById(id2);
    if (x.className.indexOf("w3-show") == -1) {
      x.className += " w3-show";
    } else {
      x.className = x.className.replace("w3-show", "");
    }
  }

</script>


</body>
</html>
