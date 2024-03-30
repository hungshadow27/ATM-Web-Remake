<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Roboto&display=swap" rel="stylesheet">
    <script src="https://cdn.tailwindcss.com"></script>
    <style type="text/tailwindcss">
        @layer utilities {
      .content-auto {
        content-visibility: auto;
      }
      @layer base {
        html {
            font-family: "Poppins", sans-serif;
        }
        }
    }
  </style>
    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        clifford: '#da373d',
                    }
                }
            }
        }
    </script>
    <title>ATM WEB</title>
</head>

<body class="bg-green-600">
    <div class="w-full max-w-screen-sm mx-auto flex flex-col items-center mt-48 bg-white p-5 rounded shadow">
        <h1 class="text-4xl mb-10 font-semibold">Đăng nhập</h1>
        <form action="<?= ROOT ?>/login/signin" method="POST" class="text-2xl space-y-5 w-[80%]">
            <div class="flex items-center gap-2 bg-green-700 border border-[2px] border-black rounded-lg">
                <label for="cardnumber" class="w-[100px] text-center text-white">Số thẻ</label>
                <input type="text" name="username" class="flex-1 ps-4 py-3 rounded-r-lg border-black">
            </div>
            <div class="flex items-center gap-2 bg-green-700 border border-[2px] border-black rounded-lg">
                <label for="password" class="w-[100px] text-center text-white">Mã PIN</label>
                <input type="password" max="6" name="password" class="flex-1 ps-4 py-3 rounded-r-lg border-black">
            </div>
            <?php if (isset($errors)) : ?>
                <div class="text-red-500 font-medium w-full text-center text-base"><?= $errors ?></div>
            <?php endif; ?>
            <div class="text-center">
                <button type="submit" class="px-5 py-3 bg-orange-400 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-orange-600">Đăng nhập</button>
            </div>
        </form>
    </div>
</body>

</html>