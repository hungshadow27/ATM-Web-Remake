<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-sm mx-auto flex flex-col items-start mt-2 bg-white px-10 py-5 rounded shadow text-lg shadow">
    <h1 class="w-full text-2xl font-semibold text-center">Thay đổi mã PIN</h1>
    <form action="<?= ROOT ?>/changepincode/handle" method="POST" class="w-full space-y-6 mt-8">
        <div class="w-full flex items-center bg-green-700 border border-[2px] border-black rounded-lg">
            <label for="pin1" class="px-4 text-center text-white">Mã PIN hiện tại</label>
            <input type="password" name="pin1" maxlength="6" class="flex-1 ps-4 py-3 rounded-r-lg border-black">
        </div>
        <div class="w-full flex items-center bg-green-700 border border-[2px] border-black rounded-lg">
            <label for="pin2" class="px-4 text-center text-white">Mã pin mới</label>
            <input type="password" name="pin2" maxlength="6" class="flex-1 ps-4 py-3 rounded-r-lg border-black">
        </div>
        <div class="w-full flex items-center bg-green-700 border border-[2px] border-black rounded-lg">
            <label for="pin3" class="px-4 text-center text-white">Nhập lại pin mới</label>
            <input type="password" name="pin3" maxlength="6" class="flex-1 ps-4 py-3 rounded-r-lg border-black">
        </div>
        <div id="receiver-name-bar-container" class="w-full p-3">
            <?= isset($error) ? $error : "" ?>
        </div>
        <div class="text-center">
            <button type="submit" class="px-5 py-3 bg-orange-400 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-orange-600">Thay đổi</button>
        </div>
    </form>
    <div class="text-center mt-8">
        <a href="<?= ROOT ?>/home" class="px-5 py-3 bg-red-300 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-red-400">Quay lại</a>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php"; ?>