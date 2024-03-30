const inputReceiverUser = document.getElementById("input-receiver-user");
const btnSearchUser = document.getElementById("btn-search-user");
const loadingContainer = document.getElementById("loading-container");
const labelShowReceiverName = document.getElementById(
  "receiver-name-bar-container"
);

const handleSearchReceiver = async () => {
  loadingContainer.style.display = "block";
  try {
    const username = inputReceiverUser.value;
    const resUser = await fetch(
      `<?=ROOT?>/user/getByUsername?username=${username}`
    );
    if (!resUser.ok) {
      throw new Error("Network response was not ok");
    }
    const dataUser = await resUser.json();
    setTimeout(() => {
      if (dataUser && !dataUser.error) {
        console.log("dataUser:", dataUser);

        loadingContainer.style.display = "none";
        labelShowReceiverName.innerHTML = dataUser.name;
      } else if (dataUser && dataUser.error) {
        loadingContainer.style.display = "none";
        labelShowReceiverName.innerHTML = dataUser.error;
      } else {
        loadingContainer.style.display = "none";
        labelShowReceiverName.innerHTML = "Không tìm thấy người nhận!";
      }
    }, 1000);
  } catch (error) {
    loadingContainer.style.display = "none";
    console.log("There was an error", error);
    labelShowReceiverName.innerHTML = "There was an error fetching data.";
  }
};

btnSearchUser.addEventListener("click", handleSearchReceiver);
inputReceiverUser.addEventListener("change", handleSearchReceiver);
