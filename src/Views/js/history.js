const transactionTableBody = document.getElementById("transaction-body");
const loadingContainer = document.getElementById("loadingContainer");
const sd = document.getElementById("sd");
const ed = document.getElementById("ed");
const handleChangePage = async (page, user_id) => {
  loadingContainer.style.display = "block";
  try {
    const resTransaction = await fetch(
      "<?= ROOT ?>/history/getByPage?page=" + page
    );
    const dataTransactions = await resTransaction.json();
    console.log(dataTransactions);
    setTimeout(() => {
      loadingContainer.style.display = "none";
      updateAllRow(dataTransactions, user_id);
    }, 500);
  } catch (error) {
    console.log("There was an error", error);
  }
};
const handleChangeDate = async (user_id) => {
  if (sd.value != "" && ed.value != "") {
    loadingContainer.style.display = "block";
    try {
      const resTransaction = await fetch(
        "<?= ROOT ?>/history/getAllTransaction"
      );
      const dataTransactions = await resTransaction.json();

      // Lấy ngày bắt đầu và kết thúc từ input
      const startDate = new Date(sd.value);
      let endDate = new Date(ed.value);
      endDate.setDate(endDate.getDate() + 1); // Tăng ngày kết thúc lên 1 để bao gồm cả ngày hiện tại

      // Lọc ra các giao dịch nằm trong khoảng thời gian từ startDate đến endDate
      const filteredTransactions = dataTransactions.filter((transaction) => {
        const transactionDate = new Date(
          transaction.create_date.replace(/-/g, "/")
        ); // Chuyển đổi chuỗi datetime thành đối tượng Date
        return transactionDate >= startDate && transactionDate < endDate; // Sử dụng "<" thay vì "<=" để không bao gồm ngày kết thúc
      });

      console.log(filteredTransactions);

      setTimeout(() => {
        loadingContainer.style.display = "none";
        updateAllRow(filteredTransactions, user_id);
      }, 500);
    } catch (error) {
      console.log("There was an error", error);
    }
  } else {
    alert("Vui lòng nhập đầy đủ thông tin");
  }
};

const updateAllRow = (dataTransactions, user_id) => {
  transactionTableBody.innerHTML = `${dataTransactions.map((item, index) => {
    return `<tr class="border-b border-neutral-200 dark:border-white/10">
    <td class="whitespace-nowrap px-6 py-4 font-medium">
        ${item.create_date}
    </td>
    <td class="whitespace-nowrap px-6 py-4">${item.transaction_id}</td>
    ${
      item.sender_id == user_id
        ? `<td class="whitespace-nowrap px-6 py-4 font-bold text-red-500">-${item.value}</td>`
        : `<td class="whitespace-nowrap px-6 py-4 font-bold text-green-500">+${item.value}</td>`
    }
    <td class="whitespace-nowrap px-6 py-4">
        <a href="<?= ROOT ?>/history/check?transaction_id=${
          item.transaction_id
        }" class="px-4 py-1 bg-blue-400 font-bold text-white border border-[2px] border-black rounded-lg transition-color duration-300 ease-linear hover:bg-blue-600">Xem</a>
    </td>
</tr>`;
  })}`;
};
