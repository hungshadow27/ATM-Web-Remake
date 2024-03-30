<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-md mx-auto flex flex-col items-start mt-2 bg-white px-10 py-5 rounded shadow text-lg shadow">
    <h1 class="w-full text-2xl font-semibold text-center">Lịch sử giao dịch</h1>
    <table class="min-w-full text-center text-sm font-light text-surface mt-8">
        <thead class="font-medium border-y-[1px] border-black">
            <tr>
                <th scope="col" class="px-6 py-4">Thời gian giao dịch</th>
                <th scope="col" class="px-6 py-4">Mã giao dịch</th>
                <th scope="col" class="px-6 py-4">Số lượng</th>
                <th scope="col" class="px-6 py-4">KQ</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($userTransactions as $transaction) : ?>
                <tr class="border-b border-neutral-200 dark:border-white/10">
                    <td class="whitespace-nowrap px-6 py-4 font-medium">
                        <?= $transaction->create_date ?>
                    </td>
                    <td class="whitespace-nowrap px-6 py-4"><?= $transaction->transaction_id ?></td>
                    <?php if ($transaction->sender_id == unserialize($_SESSION['USER'])->user_id) : ?>
                        <td class="whitespace-nowrap px-6 py-4 font-bold text-red-500">-<?= $transaction->value ?></td>
                    <?php elseif ($transaction->receiver_id == unserialize($_SESSION['USER'])->user_id) : ?>
                        <td class="whitespace-nowrap px-6 py-4 font-bold text-green-500">+<?= $transaction->value ?></td>
                    <?php endif; ?>
                    <td class="whitespace-nowrap px-6 py-4">
                        <a href="<?= ROOT ?>/history/check?transaction_id=<?= $transaction->transaction_id ?>" class="px-4 py-1 bg-blue-400 font-bold text-white border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-blue-600">Xem</a>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
    <div class="text-center mt-8">
        <a href="<?= ROOT ?>/home" class="px-5 py-3 bg-red-300 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-red-400">Quay lại</a>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php"; ?>