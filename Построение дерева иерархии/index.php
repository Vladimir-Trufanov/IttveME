<?php
// PHP7/HTML5, EDGE/CHROME                                   *** ttree.php ***

// ****************************************************************************
// * ttree               Разобрать параметры запроса и открыть страницу сайта *
// ****************************************************************************

//                                                   Автор:       Труфанов В.Е.
//                                                   Дата создания:  13.01.2019
// Copyright © 2019 tve                              Посл.изменение: 27.11.2020

// ****************************************************************************
// *              Формируем общие начальные теги разметки страницы,           *
// *           разбираем параметры запроса и открываем страницу сайта         *
// ****************************************************************************
echo '<!DOCTYPE html>';
echo '<html lang="ru">';
echo '<head>';
echo '<meta http-equiv="content-type" content="text/html; charset=utf-8"/>';
echo '<title>Обо мне, путешествиях и ... Черногории</title>';
echo '<meta name="description" content="Труфанов Владимир Евгеньевич, его жизнь и жизнь его близких">';
echo '<meta name="keywords" content="Труфанов Владимир Евгеньевич, жизнь и увлечения">';
// Подключаем общие стили
echo '<link rel="stylesheet" type="text/css" href="styles.css">';
// Начинаем html-страницу
echo '</head>'; 
echo '<body>'; 
// ----
?>

Привет! <br>

<div class="tree">
<ul>
<li>
	<div class="family">
		<div class="person child male">
			<div class="name">Grandfather</div>
		</div>
    <div class="parent">
      <div class="person female">
        <div class="name">Grandmother</div>
      </div>
      <ul>
        <li>
          <div class="family" style="width: 172px">
            <div class="person child male">
              <div class="name">Uncle</div>
            </div>
            <div class="parent">
              <div class="person female">
                <div class="name">Wife of Uncle</div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="family" style="width: 172px">
            <div class="person child female">
              <div class="name">Aunt</div>
            </div>
            <div class="parent">
              <div class="person male">
                <div class="name">Husband of Aunt</div>
              </div>
            </div>
          </div>
        </li>
        <li>
          <div class="family" style="width: 344px">
            <div class="person child female">
              <div class="name">Mother</div>
            </div>
            <div class="parent">
              <div class="person male">
                <div class="name">Father</div>
              </div>
              <ul>
                <li>
                  <div class="person child male">
                    <div class="name">Me</div>
                  </div>
                </li>
                <li>
                  <div class="person child female">
                    <div class="name">Sister</div>
                  </div>
                </li>
              </ul>
            </div>
            <div class="person spouse male">
              <div class="name">Spouse</div>
            </div>
          </div>
        </li>
      </ul>
    </div>
	</div>
</li>
</ul>
</div>

<?php
// ----
// Выводим завершающие теги страницы
echo '</body>'; 
echo '</html>';

// <!-- --> **************************************************** UpSite.php ***

