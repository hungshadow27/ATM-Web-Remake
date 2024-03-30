<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-md mx-auto flex flex-col items-start mt-2 bg-white px-10 py-5 rounded shadow text-lg shadow">
    <h1 class="w-full text-2xl font-semibold text-center">Kết quả giao dịch</h1>

    <?php if ($transaction->type == 'transfer') : ?>
        <div class="w-full space-y-4 mt-8">
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="value" class="px-4 text-center text-black"><?= $transaction->sender_id == unserialize($_SESSION['USER'])->user_id ? "Số tiền chuyển:" : "Số tiền nhận:" ?></label>
                <?php if ($transaction->sender_id == unserialize($_SESSION['USER'])->user_id) : ?>
                    <input disabled type="text" name="value" value="<?= '-' . $transaction->value ?>₫" class="flex-1 ps-4 py-3 bg-white text-red-600 font-medium">

                <?php else : ?>
                    <input disabled type="text" name="value" value="<?= '+' . $transaction->value ?>₫" class="flex-1 ps-4 py-3 bg-white text-green-600 font-medium">
                <?php endif; ?>
            </div>
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="value" class="px-4 text-center text-black">Phí:</label>
                <input disabled type="text" name="value" value="0₫" class="flex-1 ps-4 py-3 bg-white text-green-600 font-medium">
            </div>
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="receiver-user" class="px-4 text-center text-black"><?= $transaction->sender_id == unserialize($_SESSION['USER'])->user_id ? "Người nhận:" : "Người gửi:" ?></label>
                <input disabled type="text" name="receiver-user" value="<?= $transaction->sender_id == unserialize($_SESSION['USER'])->user_id ? ($transaction->receiver_info->username . ' - ' . $transaction->receiver_info->name) : ($transaction->receiver_info->username . ' - ' . $transaction->receiver_info->name) ?>" class="flex-1 ps-4 py-3 bg-white">
            </div>
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="receiver-user" class="px-4 text-center text-black">Thời gian:</label>
                <input disabled type="text" name="receiver-user" value="<?= $transaction->create_date ?>" class="flex-1 ps-4 py-3 bg-white">
            </div>
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="receiver-user" class="px-4 text-center text-black">Kết quả:</label>
                <input disabled type="text" name="receiver-user" value="Thành công" class="flex-1 ps-4 py-3 bg-white text-green-600 font-medium">
            </div>
        </div>
    <?php else : ?>
        <div class="w-full space-y-4 mt-8">
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="value" class="px-4 text-center text-black">Số tiền rút:</label>
                <input disabled type="text" name="value" value="-<?= $transaction->value ?>₫" class="flex-1 ps-4 py-3 bg-white text-red-600 font-medium">
            </div>
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="value" class="px-4 text-center text-black">Phí:</label>
                <input disabled type="text" name="value" value="0₫" class="flex-1 ps-4 py-3 bg-white text-green-600 font-medium">
            </div>
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="receiver-user" class="px-4 text-center text-black">Thời gian:</label>
                <input disabled type="text" name="receiver-user" value="<?= $transaction->create_date ?>" class="flex-1 ps-4 py-3 bg-white">
            </div>
            <div class="w-full flex items-center border-b-[1px] border-gray-300">
                <label for="receiver-user" class="px-4 text-center text-black">Kết quả:</label>
                <input disabled type="text" name="receiver-user" value="Thành công" class="flex-1 ps-4 py-3 bg-white text-green-600 font-medium">
            </div>
        </div>
    <?php endif; ?>
    <div class="text-center mt-8">
        <a href="<?= ROOT ?>/home" class="px-5 py-3 bg-red-300 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-red-400">Quay lại</a>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php"; ?>