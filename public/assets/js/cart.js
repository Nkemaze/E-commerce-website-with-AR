document.addEventListener("DOMContentLoaded", function () {
    const quantityControls = document.querySelectorAll(".quantity button");

    quantityControls.forEach(button => {
        button.addEventListener("click", function () {
            const input = this.parentElement.querySelector("input");
            let quantity = parseInt(input.value);
            
            if (this.textContent === "-" && quantity > 1) {
                quantity--;
            } else if (this.textContent === "+") {
                quantity++;
            }

            input.value = quantity;
            updateSubtotal(this.closest("tr"), quantity);
        });
    });

    function updateSubtotal(row, quantity) {
        const price = parseFloat(row.querySelector("td:nth-child(3)").textContent.replace("$", ""));
        const subtotalCell = row.querySelector("td:nth-child(5)");
        const newSubtotal = price * quantity;
        subtotalCell.textContent = `${newSubtotal}FCFA`;
    }
});
