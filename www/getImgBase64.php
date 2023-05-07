<?php

// PHP7/HTML5, EDGE/CHROME                             *** getImgBase64.php ***

// ****************************************************************************
// * TKwinGallery                     ������� ��������� ����������� c ������� *
// *                  �� ���� ������ �� ���������� �������������� � ��������� *    
// *                                                                          *
// * v1.0, 17.02.2023                               �����:      �������� �.�. *
// * Copyright � 2022 tve                           ���� ��������: 19.04.2023 *
// ****************************************************************************

// ������� ��������� �������� ���������� ������������� ���������
$NameArt='NoDefineIMG'; $Piati=0; $iif='NoDefine';
// ��������� ���� � ����������� ���������� ������� � �������
define ("pathPhpPrown",$_POST['pathPrown']);
define ("pathPhpTools",$_POST['pathTools']);

// ��� �������������� � ��������� ������ ���������� ���������:
define("articleSite",'IttveMe');  // ��� ���� ������ (�� �����)
define("editdir",'ittveEdit');    // ������� ���������� ������, ������������ ���������
define("stylesdir",'Styles');     // ������� ������ ��������� �������� � ������
define("imgdir",'Images');        // ������� ������ ��������� ��� ����� �����������
define("jsxdir",'Jsx');           // ����� javascript

// ���������� ������ ������ ���������
require_once pathPhpPrown."/CommonPrown.php";
require_once pathPhpTools."/TNotice/NoticeClass.php";
require_once "ttools/TArticlesMaker/ArticlesMakerClass.php";
// ���������� ������ �������������� ������ ���������
$note=new ttools\Notice();
// ������� ������ ��� ������ � ����� ������ ����������
$basename=$_POST['sh'].'/Base'.'/ittve';    
$username='tve'; $password='23ety17'; 
$Arti=new ttools\ArticlesMaker($basename,$username,$password,$note);
$pdo=$Arti->BaseConnect();
// ���������� ����� ������
$uid=$_POST['uid'];
$TranslitPic=$_POST['translitpic'];
// �������� �������� �� ����������� �� ������       
$table=$Arti->SelImgPic($pdo,$uid,$TranslitPic);
// ���� ������ �������, �� ���������� ���������
if ($table["TranslitPic"]==Err)
{
   $NameArt=$table["Pic"];
   $iif=$table["TranslitPic"];
}
// ���� �� ����� ������ ��  �������, �� ���������� ���������
else if ($table["TranslitPic"]==NULL)
{
   $NameArt='����������� �� ������� �������!';
   $iif=Err;
}
// �������� � ���������� �����������
else 
{
   $NameArt=$table["Pic"];
   $mime_type=$table["mime_type"];
   $messa=imok;
   $iDataPic=base64_encode($NameArt);
   $NameArt='data:'.$mime_type.';base64,'.$iDataPic.'';
   $Piati='0'; $iif='NoDefine';
}
// ���������� ���������
$message='{"NameArt":"'.$NameArt.'", "Piati":"'.$Piati.'", "iif":"'.$iif.'"}';
$message=\prown\makeLabel($message,'ghjun5','ghjun5');
echo $message;
exit;

// ******************************************************* getImgBase64.php ***

