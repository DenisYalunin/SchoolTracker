<!DOCTYPE html>
<html>
<head>
  <title>Загрузка фотографий</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f2f2f2;
      position: relative;
    }
    h1 {
      text-align: center;
      margin-top: 50px;
      color: #333;
    }
    form {
      margin: 50px auto;
      width: 400px;
      background-color: #fff;
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0 0 10px rgba(0,0,0,0.3);
    }
    input[type="radio"] {
      margin-bottom: 10px;
    }
    input[type="file"] {
      margin-bottom: 20px;
    }
    input[type="submit"], .vk-btn {
      background-color: #333;
      color: #fff;
      padding: 10px 20px;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }
    input[type="submit"]:hover, .vk-btn:hover {
      background-color: #555;
    }
    /* Добавляем стили для кнопки перехода на сайт vk.com */
    .vk-btn {
      position: absolute;
      top: -40px;
      left: 1px;
      text-decoration: none;
    }
  </style>
</head>
<body>
  <!-- Добавляем кнопку перехода на сайт vk.com -->
  <a href="http://localhost/профиль/" target="_blank" class="vk-btn">Вернуться</a>

  <h1>Загрузка фотографий</h1>
  <form method="post" enctype="multipart/form-data">
    <label><input type="radio" name="subject" value="math"> Математика</label><br>
    <label><input type="radio" name="subject" value="russian"> Русский язык</label><br>
    <label><input type="radio" name="subject" value="physics"> Физика</label><br>
    <input type="file" name="image"><br>
    <input type="submit" name="submit" value="Загрузить">
  </form>
  <?php
// Подключение к базе данных
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "paradise";
$conn = new mysqli($servername, $username, $password, $dbname);

// Проверка подключения
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}

// Обработка отправки формы
if ($_SERVER["REQUEST_METHOD"] == "POST") {
  // Получение выбранного предмета
  $subject = $_POST["subject"];

  // Увеличение счетчика выбранного предмета
  $sql = "UPDATE subjects SET $subject = $subject + 1 WHERE id = 1";
  if ($conn->query($sql) === FALSE) {
    echo "Error: " . $sql . "<br>" . $conn->error;
  }
  if (isset($_POST['submit'])) {
        $folder = '';
        switch ($_POST['subject']) {
          case 'russian':
            $folder = 'Russian/';
            break;
          case 'math':
            $folder = 'Math/';
            break;
          case 'physics':
            $folder = 'Physics/';
            break;
        }
        $filename = $_FILES['image']['name'];
        $tempname = $_FILES['image']['tmp_name'];
        $folder = $folder . $filename;
        move_uploaded_file($tempname, $folder);
        header("Location: " . $_SERVER['REQUEST_URI']);
        exit();
  }
}
?>
</body>
</html>


<!DOCTYPE html>
<html>
<head>
  <title>Галерея</title>
  <style>
    .gallery {
      display: flex;
      flex-wrap: wrap;
      justify-content: space-between;
      align-items: center;
      margin: 0 auto;
      max-width: 800px;
    }
    .gallery img {
      width: 30%;
      margin-bottom: 20px;
      cursor: pointer; /* Добавляем курсор-указатель при наведении на изображение */
    }
    .tabs {
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 20px 0;
    }
    .tab {
      padding: 10px;
      margin-right: 10px;
      cursor: pointer;
      background-color: #eee;
      border-radius: 5px;
    }
    .tab.active {
      background-color: #ccc;
    }

    /* Стили для модального окна */
    .modal {
      display: none; /* Скрываем модальное окно по умолчанию */
      position: fixed; /* Фиксированное положение */
      z-index: 1; /* Позиция окна */
      padding-top: 100px; /* Отступ сверху */
      left: 0;
      top: 0;
      width: 100%;
      height: 100%;
      overflow: auto; /* Добавляем прокрутку */
      background-color: rgba(0,0,0,0.9); /* Цвет фона */
    }

    /* Стили для изображения в модальном окне */
    .modal-content {
      margin: auto;
      display: block;
      width: 80%;
      max-width: 700px;
    }

    /* Стили для кнопки закрытия модального окна */
    .close {
      position: absolute;
      top: 15px;
      right: 35px;
      color: #f1f1f1;
      font-size: 40px;
      font-weight: bold;
      transition: 0.3s;
    }

    .close:hover,
    .close:focus {
      color: #bbb;
      text-decoration: none;
      cursor: pointer;
    }
  </style>
</head>
<body>
  <div class="tabs">
    <div class="tab active" data-folder="russian">Русский язык</div>
    <div class="tab" data-folder="math">Математика</div>
    <div class="tab" data-folder="physics">Физика</div>
  </div>
  <div class="gallery"></div>

  <!-- Модальное окно для увеличения изображения -->
  <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
  </div>

  <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
  <script>
    $(document).ready(function() {
      var folder = 'russian'; // Папка по умолчанию
      var $gallery = $('.gallery');
      var $tabs = $('.tab');

      // Загрузка фотографий
      function loadPhotos() {
        $gallery.empty();
        $.ajax({
          url: folder + '/',
          success: function(data) {
            $(data).find('a').attr('href', function(i, val) {
              if( val.match(/\.(jpe?g|png|gif)$/) ) {
                $gallery.append('<img src="' + folder + '/' + val + '">');
              }
            });
          }
        });
      }

      // Изменение вкладки
      $tabs.click(function() {
        $tabs.removeClass('active');
        $(this).addClass('active');
        folder = $(this).data('folder');
        loadPhotos();
      });

      // Открытие модального окна при клике на изображение
      $gallery.on('click', 'img', function(){
        var modal = document.getElementById("myModal");
        var modalImg = document.getElementById("img01");
        var captionText = document.getElementById("caption");
        modal.style.display = "block";
        modalImg.src = this.src;
        captionText.innerHTML = this.alt;
      });

      // Закрытие модального окна при клике на кнопку закрытия
      $('.close').click(function(){
        $('#myModal').hide();
      });

      // Загрузка фотографий при загрузке страницы
      loadPhotos();
    });
  </script>
</body>
</html>