<?php
echo "Edycja danych konta"

$email=$_SESSION['email'];
$dane=$_GET['dane'];
switch($dane)
{

case("zapisz"):
$id=$_POST['id'];
$nick=$_POST['nick'];
$email=$_POST['email'];
$phone=$_POST['phone']; 
$haslo1=$_POST['haslo1']; $haslo2=$_POST['haslo2'];

if ($name=='' || $email=='' || $phone=='' || $haslo1<>$haslo2 || $haslo1=='')
komentarz ("blad","Problem z wypełnieniem formularza","Dane w formularzu zostały źle wypełnione. Powtórz etap edycji danych");
else 
{
$zapytanie=mysql_query("select * from users where email='$email'");
if (mysql_num_rows($zapytanie)>1)
komentarz ("blad","Problem z potórzeniem danych"," W bazie danych istnieje już użytkownik z proponowanymi danymi e-mail.");
else
{
@$haslo=md5($haslo1);
$zapytanie="update users set nick='$nick', email='$email', phone='$phone', haslo='$haslo' where id='$id'";
if (mysql_query($zapytanie))
komentarz ("OK","Poprawny zapis danych"," Dane konta zostały uaktualnione");
else
komentarz ("blad","Problem z zapisem danych"," Coś poszło nie tak");

}}

break;

default:
$zapytanie=mysql_query("select * from users where email='$email'");
$wynik=mysql_fetch_array($zapytanie);

echo "<form action='Projektzal.php?akcja=dane&dane=zapisz' method='POST'>";
echo "<input type='hidden' name='id' value='".$wynik['id']."'><p>";
echo "Nazwa użytkownika: <input type='text' name='nick' value='".$wynik['nick']."'><p>";
echo "E-mail: <input type='text' name='email' value='".$wynik['email']."'><p>";
echo "Telefon: <input type='text' name='phone' value='".$wynik['phone']."'><p>";
echo "Opcja zmiana hasła: <input type='password' name='haslo1'> Powtórz: <input type='password' name='haslo2'><p>";
echo "<hr>";
echo "<input type='submit' value='Zapisz'>";
echo "</form>";
}

?>