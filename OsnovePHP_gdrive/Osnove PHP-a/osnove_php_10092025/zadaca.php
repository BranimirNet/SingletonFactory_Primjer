<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Prijava na posao</title>
</head>
<body>
  <h1>Prijava na posao</h1>
  <form action="prijava.php" method="post">
    
    <label for="ime">Ime:</label>
    <input type="text" id="ime" name="ime" required><br><br>
    
    <label for="prezime">Prezime:</label>
    <input type="text" id="prezime" name="prezime" required><br><br>
    
    <label for="lozinka">Lozinka:</label>
    <input type="password" id="lozinka" name="lozinka"><br><br>
    
    <label for="email">E-mail:</label>
    <input type="email" id="email" name="email"><br><br>
    
    <label for="telefon">Telefon:</label>
    <input type="tel" id="telefon" name="telefon"><br><br>
    
    Spol:<br>
    <input type="radio" id="musko" name="spol" value="M">
    <label for="musko">Muško</label>
    <input type="radio" id="zensko" name="spol" value="Ž">
    <label for="zensko">Žensko</label>
    <input type="radio" id="drugo" name="spol" value="D">
    <label for="drugo">Drugo</label><br><br>
    
    Vještine:<br>
    <input type="checkbox" name="skills" value="HTML"> HTML
    <input type="checkbox" name="skills" value="CSS"> CSS
    <input type="checkbox" name="skills" value="PHP"> PHP
    <input type="checkbox" name="skills" value="JavaScript"> JavaScript<br><br>
    
    <label for="pozicija">Pozicija:</label>
    <select id="pozicija" name="pozicija">
      <option value="backend">Backend Developer</option>
      <option value="frontend">Frontend Developer</option>
      <option value="qa">QA Tester</option>
    </select><br><br>
    
    <label for="motivacija">Motivacijsko pismo:</label><br>
    <textarea id="motivacija" name="motivacija" rows="5" cols="40"></textarea><br><br>
    
    <label for="cv">Životopis (CV):</label>
    <input type="file" id="cv" name="cv"><br><br>
    
    <input type="hidden" name="form_id" value="job-application-2025">
    
    <button type="submit">Pošalji</button>
    <button type="reset">Poništi</button>
  </form>
</body>
</html>
