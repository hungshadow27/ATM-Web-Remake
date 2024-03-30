<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-md mx-auto flex flex-col items-start mt-2 bg-white px-10 py-5 rounded shadow text-lg shadow">
    <h1 class="w-full text-2xl font-semibold text-center">Kết quả chuyển tiền</h1>
    <div class="w-full space-y-4 mt-8">
        <div class="w-full flex items-center border-b-[1px] border-gray-300">
            <label for="value" class="px-4 text-center text-black">Số tiền chuyển:</label>
            <input disabled type="text" name="value" value="<?= number_format($value); ?>₫" class="flex-1 ps-4 py-3 bg-white">
        </div>
        <div class="w-full flex items-center border-b-[1px] border-gray-300">
            <label for="value" class="px-4 text-center text-black">Phí:</label>
            <input disabled type="text" name="value" value="0₫" class="flex-1 ps-4 py-3 bg-white text-green-600 font-medium">
        </div>
        <div class="w-full flex items-center border-b-[1px] border-gray-300">
            <label for="receiver-user" class="px-4 text-center text-black">Người nhận:</label>
            <input disabled type="text" name="receiver-user" value="<?= $receiver->username ?> - <?= $receiver->name ?>" class="flex-1 ps-4 py-3 bg-white">
        </div>
        <div class="w-full flex items-center border-b-[1px] border-gray-300">
            <label for="receiver-user" class="px-4 text-center text-black">Thời gian:</label>
            <input disabled type="text" name="receiver-user" value="<?= $date ?>" class="flex-1 ps-4 py-3 bg-white">
        </div>
        <div class="w-full flex items-center border-b-[1px] border-gray-300">
            <label for="receiver-user" class="px-4 text-center text-black">Kết quả:</label>
            <input disabled type="text" name="receiver-user" value="Chuyển tiền thành công" class="flex-1 ps-4 py-3 bg-white text-green-600 font-medium">
        </div>
        <div class="text-center pt-5">
            <a href="<?= ROOT ?>/transfer" class="px-5 py-3 bg-orange-400 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-orange-600">Chuyển tiếp</a>
        </div>
    </div>
    <div class="text-center mt-8">
        <a href="<?= ROOT ?>/home" class="px-5 py-3 bg-red-300 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-red-400">Quay lại</a>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php"; ?>