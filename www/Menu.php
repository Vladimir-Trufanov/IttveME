<?php
// PHP7/HTML5, EDGE/CHROME                                     *** Menu.php ***

// ****************************************************************************
// * ittve.me                                        Создать и обслужить меню *
// *      Discovered from article on Ryan Collins': http://www.ryancollins.me *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.12.2020
// Copyright © 2020 tve                              Посл.изменение: 13.12.2020

echo 'Жизнь и путешествия!'.'<br>';
?>
<!-- 1 вариант

<nav role='navigation'>
  <ul>
    <li><a href="#">Home</a></li>
    <li><a href="#">About Abou tAbout</a>
      <ul>
        <li><a href="">Our team Our team Our team</a></li>
        <li><a href="">History</a></li>
        <li><a href="#">Aboutш</a>
            <ul>
               <li><a href="">Our teamш Our teamш Our teamш</a></li>
               <li><a href="">Historyш</a></li>
            </ul>
        </li>
      </ul>
    </li>
    <li><a href="#">Clients</a></li>
    <li><a href="#">Contact Us Contact Us </a>
      <ul>
        <li><a href="">Our team Our team Our team</a></li>
        <li><a href="">History</a></li>
        <li><a href="#">Aboutш</a>
            <ul>
               <li><a href="">Our teamш Our teamш Our teamш</a></li>
               <li><a href="">Historyш</a></li>
            </ul>
        </li>
      </ul>
    </li>
  </ul>
</nav>  
-->


<!-- 2 вариант
	<div id="wrapper-200a">

		<ul class="accordion">
			
			<li id="one" class="files">
				<a href="#one">Мои файлы<span>495</span></a>

				<ul class="sub-menu">		
					<li><a href="#one"><em>01</em>Dropbox<span>42</span></a></li>			
					<li><a href="#one"><em>02</em>Skydrive<span>87</span></a></li>
					<li><a href="#one"><em>03</em>FTP сервер<span>366</span></a></li>
				</ul>
			</li>
			
			<li id="two" class="mail">
				<a href="#two">Mail<span>26</span></a>

				<ul class="sub-menu">
					<li><a href="#two"><em>01</em>Hotmail<span>9</span></a></li>	
					<li><a href="#two"><em>02</em>Yahoo<span>14</span></a></li>
					<li><a href="#two"><em>03</em>Gmail<span>3</span></a></li>
				</ul>
			</li>
			
			<li id="three" class="cloud">
				<a href="#three">Облако<span>58</span></a>

				<ul class="sub-menu">			
					<li><a href="#three"><em>01</em>Соединений<span>12</span></a></li>
				
					<li><a href="#three"><em>02</em>Профилей<span>19</span></a></li>
					<li><a href="#three"><em>03</em>Опций<span>27</span></a></li>
				</ul>
			</li>
			
			<li id="four" class="sign">
				<a href="#four">Выйти</a>

				<ul class="sub-menu">					
					<li><a href="#four"><em>01</em>Выйти из</a></li>				
					<li><a href="#four"><em>02</em>Удалить аккаунт</a></li>
					<li><a href="#four"><em>03</em>Заморозить аккаунт </a></li>
				</ul>
			</li>
		
		</ul>
		
	</div>

	<div id="wrapper-200b">

		<ul class="accordion">		
			<li id="one2" class="files">
				<a href="#one2">Мои файлы<span>495</span></a>

				<ul class="sub-menu">
					<li><a href="#one2"><em>01</em>Dropbox<span>42</span></a></li>
					<li><a href="#one2"><em>02</em>Skydrive<span>87</span></a></li>
					<li><a href="#one2"><em>03</em>FTP сервер<span>366</span></a></li>
				</ul>
			</li>
			
			<li id="two2" class="mail">
				<a href="#two2">Mail<span>26</span></a>

				<ul class="sub-menu">
					<li><a href="#two2"><em>01</em>Hotmail<span>9</span></a></li>
					<li><a href="#two2"><em>02</em>Yahoo<span>14</span></a></li>
					<li><a href="#two2"><em>03</em>Gmail<span>3</span></a></li>
				</ul>
			</li>
			
			<li id="three2" class="cloud">
				<a href="#three2">Облако<span>58</span></a>

				<ul class="sub-menu">
					<li><a href="#three2"><em>01</em>Соединений<span>12</span></a></li>
					<li><a href="#three2"><em>02</em>Профилей<span>19</span></a></li>
					<li><a href="#three2"><em>03</em>Опций<span>27</span></a></li>
				</ul>
			</li>
			
			<li id="four2" class="sign">
				<a href="#four2">Выйти</a>

				<ul class="sub-menu">
					<li><a href="#four2"><em>01</em>Выйти из</a></li>
					<li><a href="#four2"><em>02</em>Удалить аккаунт</a></li>
					<li><a href="#four2"><em>03</em>Заморозить аккаунт</a></li>
				</ul>
			</li>
		
		</ul>
		
	</div>

	<div id="wrapper-600">

		<ul class="accordion">
			<li id="one3" class="files">
				<a href="#one3">Мои файлы<span>495</span></a>

				<ul class="sub-menu">
					<li><a href="#one3"><em>01</em>Dropbox<span>42</span></a></li>
					<li><a href="#one3"><em>02</em>Skydrive<span>87</span></a></li>
					<li><a href="#one3"><em>03</em>FTP сервер<span>366</span></a></li>
				</ul>
			</li>
			
			<li id="two3" class="mail">
				<a href="#two3">Mail<span>26</span></a>

				<ul class="sub-menu">
					<li><a href="#two3"><em>01</em>Hotmail<span>9</span></a></li>
					<li><a href="#two3"><em>02</em>Yahoo<span>14</span></a></li>
					<li><a href="#two3"><em>03</em>Gmail<span>3</span></a></li>
				</ul>
			</li>
			
			<li id="three3" class="cloud">
				<a href="#three3">Облако<span>58</span></a>

				<ul class="sub-menu">
					<li><a href="#three3"><em>01</em>Соединений<span>12</span></a></li>		
					<li><a href="#three3"><em>02</em>Профилей<span>19</span></a></li>
					<li><a href="#three3"><em>03</em>Опций<span>27</span></a></li>
				</ul>
			</li>
			
			<li id="four3" class="sign">
				<a href="#four3">Выйти</a>

				<ul class="sub-menu">	
					<li><a href="#four3"><em>01</em>Выйти из</a></li>
					<li><a href="#four3"><em>02</em>Удалить аккаунт</a></li>
					<li><a href="#four3"><em>03</em>Заморозить аккаунт</a></li>
				</ul>
			</li>
		
		</ul>
		
	</div>
-->

       <div class="container">

			<section class="ac-container">
				<div>
					<input id="ac-1" name="accordion-1" type="radio" />
					<label for="ac-1">О нас</label>
					<article class="ac-small">
						<p>"Скрипты для сайтов" - это молодой проект занимающийся предоставлением разнообразных скриптов веб-мастерам, с целью улучшения внешнего вида, удобства навигации их сайтов.</p>
					</article>
				</div>
				<div>
					<input id="ac-2" name="accordion-1" type="radio" />
					<label for="ac-2">Услуги</label>
					<article class="ac-medium">
						<p>Услуг мы не предоставляем, однако если вы желаете установить любую CMS систему на свой сайт (при условии наличия у вас архива данной CMS), то можете обратиться к нам через форму обратной связи. Любая помощь в комментариях на сайте осуществляется исключительно на добровольных условиях.</p>
					</article>
				</div>
				<div>
					<input id="ac-3" name="accordion-1" type="radio" />
					<label for="ac-3">Портфолио</label>
					<article class="ac-large">
						<p>У нас два небольших проекта: "Форум твоего направления" и непосредственно этот сайт "Скрипты для сайтов". Большая часть времени уходит на их содержание и обслуживание.</p>
					</article>
				</div>
				<div>
					<input id="ac-4" name="accordion-1" type="radio" />
					<label for="ac-4">Контакты</label>
					<article class="ac-large">
						<p>Связаться с нами можно через форму обратной связи (email почту), через социальные сети (twitter) или системы мгновенных сообщений: ICQ.</p>
					</article>
				</div>
			</section>
        </div>



<?php
// *************************************************************** Menu.php ***
