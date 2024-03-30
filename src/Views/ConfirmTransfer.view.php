<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-md mx-auto flex flex-col items-start mt-2 bg-white px-10 py-5 rounded shadow text-lg shadow">
    <h1 class="w-full text-2xl font-semibold text-center">Xác nhận chuyển tiền</h1>
    <div class="w-full space-y-6 mt-8">
        <div class="w-full flex items-center bg-green-600 border border-[2px] border-black rounded-lg">
            <label for="value" class="px-4 text-center text-white">Số tiền chuyển</label>
            <input readonly type="text" name="value" value="<?= number_format($value); ?>₫" class="flex-1 ps-4 py-3 rounded-r-lg border-black text-white bg-green-600">
        </div>
        <div class="w-full flex items-center bg-green-600 border border-[2px] border-black rounded-lg">
            <label for="receiver-user" class="px-4 text-center text-white">Người nhận</label>
            <input readonly type="text" name="receiver-user" value="<?= $receiver->username ?>" class="flex-1 ps-4 py-3 rounded-r-lg border-black text-white bg-green-600">
        </div>
        <div class="w-full flex items-center bg-green-600 border border-[2px] border-black rounded-lg">
            <label for="receiver-name" class="px-4 text-center text-white">Họ và tên</label>
            <input type="text" name="receiver-name" value="<?= $receiver->name ?>" class="flex-1 ps-4 py-3 text-white bg-green-600" readonly>
        </div>
        <div class="w-full flex items-center bg-green-600 border border-[2px] border-black rounded-lg">
            <label for="message" class="px-4 text-center text-white">Lời nhắn</label>
            <input type="text" name="message" value="<?= $message ?>" class="flex-1 ps-4 py-3 text-white bg-green-600" readonly>
        </div>
        <div class="text-center pt-5">
            <a href="<?= ROOT ?>/pincode" class="px-5 py-3 bg-orange-400 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-orange-600">Chuyển tiền</a>
        </div>
    </div>
    <div class="text-center mt-8">
        <input action="action" onclick="window.history.go(-1); return false;" type="submit" value="Quay lại" class="px-5 py-3 bg-red-300 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-red-400"></input>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php"; ?>