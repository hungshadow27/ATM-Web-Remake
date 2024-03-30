<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-lg mx-auto flex flex-col items-start mt-2 bg-white p-5 rounded shadow text-lg shadow">
    <div>
        Xin chào: <?= unserialize($_SESSION['USER'])->name ?>!
    </div>
    <div class="flex items-center gap-2">
        <svg width="20px" height="20px" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
            <g id="SVGRepo_bgCarrier" stroke-width="0"></g>
            <g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g>
            <g id="SVGRepo_iconCarrier">
                <path d="M12 9V14" stroke="#dc7118" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M12.0001 21.41H5.94005C2.47005 21.41 1.02005 18.93 2.70005 15.9L5.82006 10.28L8.76006 5.00003C10.5401 1.79003 13.4601 1.79003 15.2401 5.00003L18.1801 10.29L21.3001 15.91C22.9801 18.94 21.5201 21.42 18.0601 21.42H12.0001V21.41Z" stroke="#dc7118" stroke-width="1.5" stroke-linecap="round" stroke-linejoin="round"></path>
                <path d="M11.9945 17H12.0035" stroke="#dc7118" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"></path>
            </g>
        </svg>
        <span>TỪ 14/11/2023, HONGDANGBANK MIỄN PHÍ RÚT TIỀN NỘI MẠNG CHO KHÁCH HÀNG SỬ DỤNG GÓI TÀI KHOẢN!</span>
    </div>
    <div>
        <span> Quý khách vui lòng đến chi nhánh HONGDANGBANK gần nhất để đăng ký mở gói tài khoản.<br />Chi tiết liên hệ <span class="text-orange-400 font-medium">1800 456 789</span></span>
    </div>
</div>
<div class="w-full max-w-screen-lg mx-auto flex flex-col items-center mt-12 bg-white p-7 rounded shadow text-xl">
    <div class="w-full flex items-center justify-center gap-8 flex-wrap">
        <div class="w-[45%]">
            <a href="<?= ROOT ?>/transfer" class="w-full h-[112px] flex flex-col items-center gap-2 bg-green-600 transition-color duration-300 hover:bg-green-700 px-8 py-4 rounded-xl border-black border-[2px] shadow">
                <img src="https://static.vecteezy.com/system/resources/previews/021/352/966/original/money-transfer-icon-simple-arrow-dollar-web-button-ui-ux-png.png" class="max-w-[50px]" alt="">
                <span class="text-white">Chuyển khoản</span>
            </a>
        </div>
        <div class="w-[45%]">
            <a href="<?= ROOT ?>/withdraw" class="w-full h-[112px] flex flex-col items-center gap-2 bg-green-600 transition-color duration-300 hover:bg-green-700 px-8 py-4 rounded-xl border-black border-[2px] shadow">
                <img src="https://cdn-icons-png.flaticon.com/512/5024/5024665.png" class="max-w-[50px]" alt="">
                <span class="text-white">Rút tiền</span>
            </a>
        </div>
        <div class="w-[45%]">
            <a href="<?= ROOT ?>/balance" class="w-full h-[112px] flex flex-col items-center gap-2 bg-green-600 transition-color duration-300 hover:bg-green-700 px-8 py-4 rounded-xl border-black border-[2px] shadow">
                <img src="https://cdn.iconscout.com/icon/free/png-256/free-check-balance-1817188-1538056.png?f=webp" class="max-w-[50px]" alt="">
                <span class="text-white">Kiểm tra số dư</span>
            </a>
        </div>
        <div class="w-[45%]">
            <a href="<?= ROOT ?>/changepincode" class="w-full h-[112px] flex flex-col items-center gap-2 bg-green-600 transition-color duration-300 hover:bg-green-700 px-8 py-4 rounded-xl border-black border-[2px] shadow">
                <img src="https://cdn-icons-png.flaticon.com/512/5363/5363258.png" class="max-w-[50px]" alt="">
                <span class="text-white">Đổi mã pin</span>
            </a>
        </div>
        <div class="w-[45%]">
            <a href="<?= ROOT ?>/history" class="w-full h-[112px] flex flex-col items-center gap-2 bg-green-600 transition-color duration-300 hover:bg-green-700 px-8 py-4 rounded-xl border-black border-[2px] shadow">
                <img src="https://cdn-icons-png.flaticon.com/512/9368/9368448.png" class="max-w-[50px]" alt="">
                <span class="text-white">Lịch sử giao dịch</span>
            </a>
        </div>
    </div>
</div>
<?php require_once "./src/Views/layouts/footer.php"; ?>