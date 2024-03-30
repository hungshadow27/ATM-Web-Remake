<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-md mx-auto flex flex-col items-start mt-2 bg-white px-10 py-5 rounded shadow text-lg shadow">
    <h1 class="w-full text-2xl font-semibold text-center">Xác nhận rút tiền</h1>
    <div class="w-full space-y-6 mt-8">
        <div class="w-full flex items-center bg-green-700 border border-[2px] border-black rounded-lg">
            <label for="value" class="px-4 text-center text-white">Số tiền rút</label>
            <input disabled type="text" name="value" value="<?= number_format($value); ?>₫" class="flex-1 ps-4 py-3 rounded-r-lg border-black text-yellow-500">
        </div>
        <div class="text-center pt-5">
            <a href="<?= ROOT ?>/pincode" class="px-5 py-3 bg-orange-400 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-orange-600">Rút tiền</a>
        </div>
    </div>
    <div class="text-center mt-8">
        <input action="action" onclick="window.history.go(-1); return false;" type="submit" value="Quay lại" class="px-5 py-3 bg-red-300 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-red-400"></input>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php"; ?>