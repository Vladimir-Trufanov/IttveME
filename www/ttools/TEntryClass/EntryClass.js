// PHP7/HTML5, EDGE/CHROME                                *** EntryClass.js ***

// ****************************************************************************
// * ittve.me                                Блок общих функций на JavaScript *
// *                                         для входа и регистрации на сайте *
// *                                                                          *
// * v1.5, 31.10.2023                               Автор:      Труфанов В.Е. *
// * Copyright © 2023 tve                           Дата создания: 01.04.2023 *
// ****************************************************************************

// Добавляем к штатным, дополнительные контроли правильности заполнения адреса 
// электронной почты и пароля (по опыту лучше их вставлять в обработчик 
// addEventListener нежели в blur) ----------------------------- iniMem.php ---

// -------------------------------------- АНИМАЦИЯ ПРИ ВВОДЕ EMAIL И ПАРОЛЯ ---

$(document).ready(function()
{
   // Поднимаем и уменьшаем подсказку при входе в поле редактирования
   document.querySelectorAll("fieldset.with-placeholder input").forEach(function (el, idx) 
   {
      el.addEventListener("focus", function () 
      {
         this.parentNode.querySelector(".placeholder").classList.add("active");
      });
      el.addEventListener("blur", function () 
      {
         if (this.value == "") 
         {
            this.parentNode.querySelector(".placeholder").classList.remove("active");
         }
      });
   });
   // Обеспечиваем движение глазками при вводе email
   var email = document.querySelector("#email");
   if (email != null)
   {
      email.addEventListener("focus", updateMouthEyes);
      email.addEventListener("input", updateMouthEyes);
      email.addEventListener("blur", function () 
      {
         var pupilRight = document.querySelector("#pupil-right");
         if (pupilRight != null)
         {
            pupilRight.setAttribute("cx", 84);
            pupilRight.setAttribute("cy", 69);
         }
         var pupilLeft = document.querySelector("#pupil-left");
         if (pupilLeft != null)
         {
            pupilLeft.setAttribute("cx", 120);
            pupilLeft.setAttribute("cy", 71);
         }
      });
   }
   // Обеспечиваем анимацию пароля: перемещаем руки, чтобы прикрыть глаза при 
   // фокусировке на поле ввода пароля, 
   // возвращаем руки в исходное положение при покидании поля пароля
   var password = document.querySelector("#password");
   if (password != null)
   {
      password.addEventListener("focus", function () 
      {
         document.querySelector("#ghost-arm-left").setAttribute("d", "M 155,88 C 145,68 105,51 103,62 102,74 123,117 155,116");
         document.querySelector("#ghost-arm-right").setAttribute("d", "M 45,89 C 54,64 103,48 106,64 108,80 65,121 48,119");
      });
      password.addEventListener("blur", function () 
      {
         document.querySelector("#ghost-arm-left").setAttribute("d", "M 155,88 C 191,90 194,114 192,125 191,137 172,109 155,116");
         document.querySelector("#ghost-arm-right").setAttribute("d", "M 45,89 C 25,92 9,108 11,124 13,141 27,115 48,119");
      });
   }
   // Выполняем дополнительный контроль email
   const emailCtrl = document.getElementById("email");
   if (emailCtrl != null)
   {
      emailCtrl.addEventListener("input", (event) => 
      {
         // Определяем формат email и проверяем по регулярному выражению 
         var remail=/([a-z0-9]+)@([a-z0-9]+)\.([a-z]+)/;
         var OK=remail.exec(emailCtrl.value);
         // Делаем проверки на число символов в поле ввода
         if (emailCtrl.value.length<8) emailCtrl.setCustomValidity(mBolee8)
         else if (emailCtrl.value.length>21) emailCtrl.setCustomValidity(mMenee21)
         // Проверяем присутствие пробелов
         else if (isSpaces(emailCtrl.value)) emailCtrl.setCustomValidity(mNoSpace)
         // Делаем проверку на присутствие русских букв
         else if (isRuss(emailCtrl.value)) emailCtrl.setCustomValidity(mNeruss)
         // Делаем проверку на присутствие больших латинских букв"
         else if (isLatPropisi(emailCtrl.value)) emailCtrl.setCustomValidity(mNelatPropisi)
         // Делаем проверку по формату: "tve@karelia.ru", "tve58@inbox.ru"
         else if (!OK) emailCtrl.setCustomValidity(mEmneformat)
         // Все правильно
         else emailCtrl.setCustomValidity("");
      });
   }
   // Выполняем дополнительный контроль пароля
   const passCtrl = document.getElementById("password");
   if (passCtrl != null)
   {
      passCtrl.addEventListener("input", (event) => 
      {
         // Делаем проверку на отсутствие специальных символов
         if (!isSpecsim(passCtrl.value)) passCtrl.setCustomValidity(mSpecsim+' в пароле: "'+passCtrl.value+'"')
         // Делаем проверку на число символов в поле ввода
         else if (passCtrl.value.length<8) passCtrl.setCustomValidity(mBolee8+': "'+passCtrl.value+'"')
         else if (passCtrl.value.length>21) passCtrl.setCustomValidity(mMenee21+': "'+passCtrl.value+'"')
         // Проверяем присутствие пробелов
         else if (isSpaces(passCtrl.value)) passCtrl.setCustomValidity(mNoSpace+': "'+passCtrl.value+'"')
         // Проверяем присутствие хотя бы одной прописной латинской буквы
         else if (!isLatPropisi(passCtrl.value)) passCtrl.setCustomValidity(mDalatPropisi+': "'+passCtrl.value+'"')
         // Делаем проверку на присутствие русских букв
         else if (isRuss(passCtrl.value)) passCtrl.setCustomValidity(mNeruss+': "'+passCtrl.value+'"')
         // Делаем проверку на отсутствие цифр
         else if (!isNumbers(passCtrl.value)) passCtrl.setCustomValidity(mNumbers+': "'+passCtrl.value+'"')
         // Все правильно
         else passCtrl.setCustomValidity("");
      });
   }
   
   // Обрабатываем изменение состояние скрепки
   const imgToggle = document.getElementById("toggle");
   if (imgToggle != null)
   {
      imgToggle.addEventListener("change",function()
      {
         // Меняем изображение кнопки на скрепке
	      let label = document.querySelector("#lbltoggle");
	      label.classList.remove("pristine");
         
         toggleScrepa(null);
         
         /*
         // Если кнопка на скрепке зеленая, то активно 
         if (document.getElementById('toggle').checked) 
         {
            console.log("checked");
            //$('#submit').html("checked");
            $('#submit').css('color','red');
            $('#submit').attr('value',"checked");
         } 
         else 
         {
            console.log("You didn't check it! Let me check it for you.");
            //$('#submit').html("You didn't check it!");
            $('#submit').css('color','blue');
            $('#submit').attr('value',"You didn't check it!");
         }
         */
      });
   }
   
   toggleScrepa(tstEmailNeNajdenen);

})

// ****************************************************************************
// *      Изменить положение глаз при вводе символов в поле редактирования    *
// ****************************************************************************
function updateMouthEyes() 
{
   if (email.value.length > 0) 
   {
         if (email.value.indexOf("@") > 0 && email.value.indexOf("@") < email.value.length - 1) 
      {
         document.querySelector("#mouth").setAttribute("d", "M 75,115 C 79,110 92,117 102,117 111,117 123,111 127,114 131,117 123,136 102,136 81,137 73,121 75,115 Z");
      } 
      else 
      {
         document.querySelector("#mouth").setAttribute("d", "M 75,115 C 79,110 92,119 101,119 110,119 123,111 127,114 131,117 118,131 102,132 87,132 73,121 75,115 Z");
      }
   } 
   else 
   {
      document.querySelector("#mouth").setAttribute("d", "M 75,115 C 79,120 91,126 101,125 110,125 126,118 127,114 125,117 117,125 101,125 85,126 79,117 75,115 Z");
   }

   var pupilRight = document.querySelector("#pupil-right");
   var pupilLeft = document.querySelector("#pupil-left");
   var movePos = email.value.length > 30 ? 13.33 : email.value.length / 2.25;
   pupilRight.setAttribute("cy", 75);
   pupilLeft.setAttribute("cy", 76);
   pupilRight.setAttribute("cx", 78 + movePos);
   pupilLeft.setAttribute("cx", 113 + movePos);
}

// ------------------------------ ДОПОЛНИТЕЛЬНЫЕ КОНТРОЛИ ВВОДА И ОБРАБОТКИ ---

// ****************************************************************************
// *                    Проверить присутствие русских букв                    *
// ****************************************************************************
function isRuss(cValue)
{ 
   let Result;
   let re=/[аАбБвВгГдДеЕёЁжЖзЗиИйЙкКлЛмМнНоОпПрРсСтТуУфФхХцЦчЧшШщЩъЪыЫьЬэЭюЮяЯ]+/;
   Result=re.exec(cValue);
   return Result;
}
// ****************************************************************************
// *               Проверить присутствие прописных латинских букв             *
// ****************************************************************************
function isLatPropisi(cValue)
{ 
   let Result;
   let re=/[A-Z]+/;
   Result=re.exec(cValue);
   return Result;
}
// ****************************************************************************
// *                     Проверить присутствие пробелов                       *
// ****************************************************************************
function isSpaces(cValue)
{ 
   let Result;
   let re=/[\s]+/;
   Result=re.exec(cValue);
   return Result;
}
// ****************************************************************************
// *                         Проверить присутствие цифр                       *
// ****************************************************************************
function isNumbers(cValue)
{ 
   let Result;
   let re=/\d/;
   Result=re.exec(cValue);
   return Result;
}
// ****************************************************************************
// *               Проверить присутствие специальных символов                 *
// ****************************************************************************
function isSpecsim(cValue)
{ 
   let Result;
   let re=/[\+\-*_#@!%?&=\[\]\{\}~\^\$\(\)\/№\.,:;\\'"`]+/;
   Result=re.exec(cValue);
   return Result;
}

// -------------------------------------- ОБРАБОТКА ВВОДА ЭЛ.ПОЧТЫ И ПАРОЛЯ ---

// ****************************************************************************
// *                 Проверить пароль и email по базе данных                  *
// ****************************************************************************
function tstEmailPass()
{
   let Result=tstEmailNeNajdenen;
   console.log('tstEmailPass()');
}
// ****************************************************************************
// *  Установить начальное состояние (или состояния выбора пользователя) для  *
// *                 серой кнопки ("замороженного действия")                  *
// *                  и кнопки submit ("активного действия")                  *
// ****************************************************************************
function toggleScrepa(mode)
{
   if (mode==null)
   {
      // Если кнопка на скрепке зеленая, то активно 
      if (document.getElementById('toggle').checked) 
      {
         console.log("checked");
         //$('#submit').html("checked");
         $('#submit').css('color','red');
         $('#submit').attr('value',"checked");
      } 
      else 
      {
         console.log("You didn't check it! Let me check it for you.");
         //$('#submit').html("You didn't check it!");
         $('#submit').css('color','blue');
         $('#submit').attr('value',"You didn't check it!");
      }
   }
   else if (mode==tstEmailNeNajdenen)
   {
      $('#GrayInput').html("Зарегистрироваться");
      $('#submit').attr('value',"Пройти на сайт, как гость");
   }
}

/*
function CtrlEmailPass()
{
   let passiv=$('#password').val();
   let emaili=$('#email').val();
   //alert('Привет! '+passiv+' -> '+emaili);
   //let Description='Описания нет!';
   pathphp="CtrlEmailPass.php";
   // Делаем запрос на определение наименования раздела материалов
   $.ajax({
      url: pathphp,
      type: 'POST',
      data: {pathTools:pathPhpTools,pathPrown:pathPhpPrown,sh:SiteHost},
      // Выводим ошибки при невозможности выполнении запроса
      error: function (jqXHR,exception,errorMsg) 
      {
         Error_Info(pathphp+': '+SmarttodoError(jqXHR,exception));
      },
      // Обрабатываем ответное сообщение
      success: function(message)
      {
         // Вырезаем из запроса чистое сообщение
         messa=FreshJSON(message);
         // Получаем параметры ответа
         parm=JSON.parse(messa);
         // При ошибке выводим сообщение об ошибке
         if (parm.iif==nstErr) 
         { 
            Error_Info(parm.NameGru);
         }
         // Если все хорошо, выбираем описание
         else
         {
            Notice_Info('messa','Оk',true,250);
            //Description=parm.NameGru;
            //Error_Info('Все хорошо!');
            //alert('Все хорошо!');
            //setTimeout(function() {location.reload();},2500);
            
            $('#DialogWind').html('DialogWind messa');
            $('#DialogWind').dialog("open");

            $('#ImgDialogWind"').html('ImgDialogWind" messa');
            $('#ImgDialogWind"').dialog("open");


         }
      }
   });
}
*/

// ********************************************************** EntryClass.js ***

