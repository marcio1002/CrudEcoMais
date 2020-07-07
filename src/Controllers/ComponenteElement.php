<?php
namespace Ecomais\Controllers;

class ComponenteElement
{
  public static function navBarHome():string
  {
    $urlRegister = renderUrl('/cadastro');
    $logo = renderUrl('/src/assets/imgs/ecomais-logo.jpg');
    $index = renderUrl();
    $login = renderUrl("/login");
return <<<navBar
      <div class='container text-white' id='nav-container'>
        <nav class='navbar navbar-expand-sm fixed-top navbar-dark font-weight-bold'>
          <button class='navbar-toggler' type='button' data-toggle='collapse' data-target='#navbar-links'
            aria-controls='navbar-links' aria-expanded='false' aria-label='Toggle navigation'>
            <span class='navbar-toggler-icon'></span>
          </button>
          <div class='collapse navbar-collapse  justify-content-between' id='navbar-links'>
            <div class='' id='box-logo'>
                <a class='navbar-brand' href='$index' >
                <img id='logo' src='$logo' alt='ecom'>
            </a>
            </div>
            <div class='navbar-nav'>
              <a class='nav-item nav-link item-hover position-relative text-white' id='home-menu' href='$index'>Home</span></a>
              <a class='nav-item nav-link item-hover position-relative text-white' id='about-menu' href='$urlRegister' >Cadastre-se</a>
              <a class='nav-item nav-link item-hover position-relative text-white' id='services-menu' href='#'>Serviços</a>
              <a class='nav-item nav-link item-hover position-relative text-white' id='portfolio-menu' href='#'>Projetos</a>
            </div>
            <div>
            <a class='nav-item nav-link rounded-left text-center rounded-right rounded-bottom rounded-top border border-color-yellow border-success text-white' id='login' href='$login'>Entrar</a>
            </div>
          </div> 
        </nav>
      </div>
    <div class='subNavBar' style='background: transparent'>
    </div>
navBar;
  }

  public static function footerHome():string
  {
return <<<footer
    <div id="contact-area" class='text-center bg-color-green-dark-1 text-white'>
    <div class="container p-2">
        <div class="col-xl-12 col-md-12">
        <div class="col-md-12 p-2" id="contact-form">
            <p>Receba nossa Newsletter </p>
            <div class="col-md-5 m-auto">
            <input type="text" class="form-control" placeholder="email@exemplo.com" id="emailNewsLetter">
            <div class="row pt-3">
                <button type="button" class="main-btn text-black m-auto" id='btnEnv' >enviar</button>
                </div>
            </div>
        </div>
        </div>
        <div class="col-xl-12 col-md-12 p-xl-4">
        <div class="col-md-12">
            <h3 class="main-title">Entre em contato conosco</h3>
        </div>
        <div class="row">
        <div class="col-md-4 contact-box">
            <i class="fas fa-phone"></i>
            <p><span class="contact-tile">Telefone:</span> (48)99999-9999</p>
            <p><span class="contact-tile">Horários de atendimento:</span><br /> 8:00 - 19:00</p>
        </div>
        <div class="col-md-4 contact-box">
            <i class="fas fa-envelope"></i>
            <p><span class="contact-tile">Envie um email:</span> ecomais5354@gmail.com</p>
        </div>
        <div class="col-md-4 contact-box">
            <i class="fas fa-map-marker-alt"></i>
            <p><span class="contact-tile">Endereço:</span><br /> Itaquá Garden Shopping Itaquaquecetuba - SP - 1314</p>
        </div>
        </div>
        </div>
        <div class="col-xl-12 col-md-12">
        <p>Desenvolvido por <a href="#">EcoMais</a> &copy; 2020</p>
        </div>
    </div>
    </div>
footer;
  }


  public static function mail($name,$token):string
  {
    $url = renderUrl("/recuperarsenha/novasenha/$token");
    $font1 = "padding:0;font-family:'Proxima Nova Soft','Proxima Nova','Helvetica Neue',Helvetica,Arial,sans-serif";
    $font2 ="font-size:20px;font-weight:600;font-family:'Proxima Nova Soft','Proxima Nova','Helvetica Neue',Helvetica,Arial,sans-serif;color:#272726;display:inline-block;padding:16px 24px;text-decoration:none";
    $font3 = "font-family:'Proxima Nova Soft','Proxima Nova','Helvetica Neue',Helvetica,Arial,sans-serif";
    $background = "https://ci4.googleusercontent.com/proxy/zi2B0d_rqBrjZUnbvWBsWVB8fe8l8zm2FoPZ47PHEU2ogMXdxR09xVIKWM8QHcCmFCTyyzH0kRR1HLgukAU2J3cKuZGRln3KRpGokTAh0qER=s0-d-e1-ft#https://img.fortawesome.com/349cfdf6/tile-info-icons-misc1.png";
return<<<mail
      <div id=':19t' class='ii gt'>
        <div id=':19s' class='a3s aXjCH undefined' dir='ltr'><u></u>
            <div bgcolor='#f8f9fa'>
                <table width='100%' cellspacing='0' cellpadding='0' border='0'>
                    <tbody>
                        <tr>
                            <td style='padding:50px 15px 25px 15px' class='m_3883943874581931121mobile-padding' width='100%' valign='top' bgcolor='#f8f9fa' align='center'>
                                <table class='m_3883943874581931121mobile-wrapper' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
                                    <tbody></tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:25px 15px 25px 15px' class='m_3883943874581931121mobile-padding'
                                width='100%' valign='top' height='100%' bgcolor='#f8f9fa' align='center'>
                                <table class='m_3883943874581931121mobile-wrapper' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
                                    <tbody>
                                        <tr>
                                            <td style=$font1 valign='top' align='center'>
                                                <table width='100%' cellspacing='0' cellpadding='0' border='0'>
                                                    <tbody>
                                                        <tr>
                                                            <td style='border-radius:8px 8px 0 0;padding:40px;background:#1864ab url($background);border-bottom:4px solid #155591'  align='center'>
                                                                <table width='100%' cellspacing='0' cellpadding='0' border='0'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td align='left'>
                                                                                <p style='color:#a3daff;font-size:20px;font-family:'Proxima Nova Soft','Proxima Nova','Helvetica Neue',Helvetica,Arial,sans-serif;font-weight:600;text-transform:uppercase;letter-spacing:1.25px;line-height:24px;margin:0 0 20px 0;display:block' >
                                                                                    Olá! 
                                                                                </p>
                                                                                <h2 style='font-size:32px;font-weight:600;color:#f8f9fa;margin:0 0 20px 0'>
                                                                                    $name 
                                                                                </h2>
                                                                                <p
                                                                                    style='color:#a3daff;font-size:20px;line-height:30px;margin:0'>
                                                                                    Para redefinir sua senha click no
                                                                                    botão logo abaixo, você será redirecionado para a tela de recupação de senha.<br/><strong>A url se expira em 2 horas.</strong>
                                                                                </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding:0;font-family:'Proxima Nova Soft','Proxima Nova','Helvetica Neue',Helvetica,Arial,sans-serif'  valign='top' align='center'>
                                                <table width='100%' cellspacing='0' cellpadding='0' border='0'>
                                                    <tbody>
                                                        <tr>
                                                            <td style='border-radius:0 0 8px 8px; padding:40px 40px 0 40px' bgcolor='#ffffff' align='center'>
                                                                <table width='100%' cellspacing='0' cellpadding='0' border='0'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style='text-decoration: none;font-weight: 700;font-size: 25px; background-color:#FEF56F;border-radius:4px;border: 1px solid #F1E53D; border-bottom: 3px solid #F1E53D; border-right: 3px solid #F1E53D; padding:20px;' align='center'>
                                                                                <a style='text-decoration:none' href='$url' style='$font2' target='_blank'>Redefinir minha senha</a> 
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td style='border-radius:0 0 8px 8px;padding:40px' bgcolor='#ffffff' align='center'>
                                                                <table width='100%' cellspacing='0' cellpadding='0' border='0'>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td style=$font3 align='left'>
                                                                                <h3>
                                                                                    <p style='color:#a3daff;font-size:20px;line-height:30px;margin:0'>
                                                                                        Se este endereço de email não é
                                                                                        o seu ignore-o.
                                                                                    </p>
                                                                                </h3>
                                                                                <p style='color:#868e96;font-size:16px;line-height:24px;margin:0'>
                                                                                    O EcoMais sempre buscando o melhor
                                                                                    para você a sua economia. Você pode ler
                                                                                    mais sobre os 
                                                                                <a href='#' style='color:#329af0' target='_blank'>termos de serviço</a> 
                                                                                para o bem estar nossa platadorma leia também a  
                                                                                <a href='https://www.localhost/www/EcoMais/terms' style='color:#329af0' target='_blank'> política de  privacidade</a> , se você gostaria. </p>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                        <tr>
                            <td style='padding:25px 15px 50px 15px' class='m_3883943874581931121mobile-padding' width='100%' valign='top' height='100%' bgcolor='#f8f9fa' align='center'>
                                <table class='m_3883943874581931121mobile-wrapper' width='600' cellspacing='0' cellpadding='0' border='0' align='center'>
                                    <tbody>
                                        <tr>
                                            <td style='padding:0 0 15px 0' valign='top' align='center'> 
                                            <a style='display:block' width='33' height='33' bo  alt='Acessar website ecomais' target='_blank'>
                                                <svg aria-hidden='true' focusable='false' data-prefix='fad' data-icon='shopping-cart' role='img' xmlns='http://www.w3.org/2000/svg' viewBox='0 0 576 512' class='svg-inline--fa fa-shopping-cart fa-w-18 fa-3x'><g class='fa-group'><path fill='currentColor' d='M552 64H159.21l52.36 256h293.15a24 24 0 0 0 23.4-18.68l47.27-208a24 24 0 0 0-18.08-28.72A23.69 23.69 0 0 0 552 64z' class='fa-secondary'></path><path fill='currentColor' d='M218.12 352h268.42a24 24 0 0 1 23.4 29.32l-5.52 24.28a56 56 0 1 1-63.6 10.4H231.18a56 56 0 1 1-67.05-8.57L93.88 64H24A24 24 0 0 1 0 40V24A24 24 0 0 1 24 0h102.53A24 24 0 0 1 150 19.19z' class='fa-primary'></path></g></svg>
                                            </a> 
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding:0 0 5px 0;font-family:'Proxima Nova Soft','Proxima Nova','Helvetica Neue',Helvetica,Arial,sans-serif;color:#868e96'
                                                valign='top' align='center'>
                                                <p style='font-size:14px;line-height:20px;color:#868e96'> 
                                                <a href='#' style='color:#adb5bd' target='_blank'>Descontos</a> • 
                                                <a href='#' style='color:#adb5bd' target='_blank'>Sua Conta</a> •
                                                <a href='#' style='color:#adb5bd' target='_blank'>Fale Conosco</a>
                                                </p>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td style='padding:0 0 5px 0;font-family:'Proxima Nova Soft','Proxima Nova','Helvetica Neue',Helvetica,Arial,sans-serif;color:#adb5bd'
                                                valign='top' align='center'>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>
mail;
  }

}
