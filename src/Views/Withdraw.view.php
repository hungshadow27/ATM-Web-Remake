<?php require_once "./src/Views/layouts/header.php"; ?>
<div class="w-full max-w-screen-md mx-auto flex flex-col items-start mt-2 bg-white px-10 py-5 rounded shadow text-lg shadow">
    <h1 class="w-full text-2xl font-semibold text-center">Rút tiền</h1>
    <form action="<?= ROOT ?>/withdraw/confirm" method="POST" class="w-full space-y-6 mt-8">
        <div class="flex items-center justify-center w-full flex-wrap gap-2">
            <div class="w-[30%]">
                <input type="radio" name="withdraw_amount" id="1" value="50000" class="peer hidden input-radio" />
                <label for="1" class="block cursor-pointer select-none rounded-xl p-2 text-center border-[2px] border-black peer-checked:bg-green-700 peer-checked:font-bold peer-checked:text-white transition-color duration-300 hover:bg-green-200">50.000</label>
            </div>
            <div class="w-[30%]">
                <input type="radio" name="withdraw_amount" id="2" value="100000" class="peer hidden input-radio" />
                <label for="2" class="block cursor-pointer select-none rounded-xl p-2 text-center border-[2px] border-black peer-checked:bg-green-700 peer-checked:font-bold peer-checked:text-white transition-color duration-300 hover:bg-green-200">100.000</label>
            </div>
            <div class="w-[30%]">
                <input type="radio" name="withdraw_amount" id="3" value="200000" class="peer hidden input-radio" />
                <label for="3" class="block cursor-pointer select-none rounded-xl p-2 text-center border-[2px] border-black peer-checked:bg-green-700 peer-checked:font-bold peer-checked:text-white transition-color duration-300 hover:bg-green-200">200.000</label>
            </div>
            <div class="w-[30%]">
                <input type="radio" name="withdraw_amount" id="4" value="500000" class="peer hidden input-radio" />
                <label for="4" class="block cursor-pointer select-none rounded-xl p-2 text-center border-[2px] border-black peer-checked:bg-green-700 peer-checked:font-bold peer-checked:text-white transition-color duration-300 hover:bg-green-200">500.000</label>
            </div>
            <div class="w-[30%]">
                <input type="radio" name="withdraw_amount" id="5" value="2000000" class="peer hidden input-radio" />
                <label for="5" class="block cursor-pointer select-none rounded-xl p-2 text-center border-[2px] border-black peer-checked:bg-green-700 peer-checked:font-bold peer-checked:text-white transition-color duration-300 hover:bg-green-200">2.000.000</label>
            </div>
            <div class="w-[30%]">
                <input type="radio" name="withdraw_amount" id="6" value="5000000" class="peer hidden input-radio" />
                <label for="6" class="block cursor-pointer select-none rounded-xl p-2 text-center border-[2px] border-black peer-checked:bg-green-700 peer-checked:font-bold peer-checked:text-white transition-color duration-300 hover:bg-green-200">5.000.000</label>
            </div>
        </div>
        <div class="w-[60%] flex items-center mx-auto bg-green-700 border border-[2px] border-black rounded-lg">
            <label for="other_amount" class="px-4 text-center text-white">Số khác:</label>
            <input type="number" name="other_amount" class="flex-1 ps-4 py-3 rounded-r-lg border-black input-other">
        </div>
        <div id="receiver-name-bar-container" class="w-full p-3">
            <?= isset($error) ? $error : "" ?>
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
    const inputRadios = document.getElementsByClassName('input-radio');
    const inputOther = document.getElementsByClassName('input-other');
    inputOther[0].addEventListener('click', () => {
        for (var i = 0; i < inputRadios.length; i++) {
            inputRadios[i].checked = false;
        }
    })
    for (var i = 0; i < inputRadios.length; i++) {
        inputRadios[i].addEventListener('click', () => {
            inputOther[0].value = "";
        })
    }
</script>
<?php require_once "./src/Views/layouts/footer.php"; ?>