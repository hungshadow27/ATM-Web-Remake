<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-md mx-auto flex flex-col items-start mt-2 bg-white px-10 py-5 rounded shadow text-lg shadow">
    <h1 class="w-full text-2xl font-semibold text-center">Chuyển tiền</h1>
    <form action="<?= ROOT ?>/transfer/confirm" method="POST" class="w-full space-y-6 mt-8" id="form-input">
        <div class="w-full flex items-center bg-green-700 border border-[2px] border-black rounded-lg">
            <label for="value" class="px-4 text-center text-white">Số tiền chuyển</label>
            <input type="number" name="value" class="flex-1 ps-4 py-3 rounded-r-lg border-black">
        </div>
        <div class="w-full flex items-center bg-green-700 border border-[2px] border-black rounded-lg">
            <label for="receiver-user" class="px-4 text-center text-white">Số tài khoản người nhận</label>
            <input id="input-receiver-user" type="text" name="receiver-user" class="flex-1 ps-4 py-3">
            <button type="button" id="btn-search-user" class="p-3 text-center transition-color duration-300 ease-linear hover:bg-green-600 rounded-r-lg">
                <svg width="25px" height="25px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
                    <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
                    <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
                    <g id="SVGRepo_iconCarrier">
                        <path d="M15.7955 15.8111L21 21M18 10.5C18 14.6421 14.6421 18 10.5 18C6.35786 18 3 14.6421 3 10.5C3 6.35786 6.35786 3 10.5 3C14.6421 3 18 6.35786 18 10.5Z" stroke="#ffffff" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
                    </g>
                </svg>
            </button>
        </div>
        <div id="loading-container" class="hidden w-full text-center">Loading...</div>
        <div id="receiver-name-bar-container" class="w-full p-3">
            <?= isset($error) ? $error : "" ?>
        </div>
        <div class="w-full flex items-center bg-green-700 border border-[2px] border-black rounded-lg">
            <label for="message" class="px-4 text-center text-white">Lời nhắn</label>
            <input type="text" name="message" class="flex-1 ps-4 py-3">
        </div>
        <div class="text-center">
            <button type="submit" class="px-5 py-3 bg-orange-400 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-orange-600">Tiếp tục</button>
        </div>
    </form>
    <div class="text-center mt-8">
        <input action="action" onclick="window.history.go(-1); return false;" type="submit" value="Quay lại" class="px-5 py-3 bg-red-300 border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-red-400"></input>
    </div>
</div>
<script>
    <?php require_once "./src/Views/js/transfer.js"; ?>
</script>
<?php require_once "./src/Views/layouts/footer.php"; ?>