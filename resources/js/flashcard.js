document.addEventListener("DOMContentLoaded", () => {
    const createBtn = document.getElementById("createCardBtn");
    const modal = document.querySelector(".flashcard-modal");
    const flashcardList = document.querySelector(".flashcard-container");

    // Mở popup tạo flashcard
    if (createBtn) {
        createBtn.addEventListener("click", () => {
            modal.classList.add("active");
        });
    }

    // Đóng modal khi click ra ngoài
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.classList.remove("active");
        }
    });

    // Lật thẻ khi click
    document.addEventListener("click", (e) => {
        const flashcard = e.target.closest(".flashcard");
        if (flashcard && !e.target.closest(".delete-btn")) {
            flashcard.classList.toggle("flipped");
        }
    });

    // Tạo mới flashcard
    const createForm = document.getElementById("createFlashcardForm");
    if (createForm) {
        createForm.addEventListener("submit", (e) => {
            e.preventDefault();

            const word = document.getElementById("wordInput").value.trim();
            const meaning = document.getElementById("meaningInput").value.trim();

            if (!word || !meaning) {
                alert("Vui lòng nhập đầy đủ thông tin!");
                return;
            }

            const newCard = document.createElement("div");
            newCard.classList.add("flashcard");
            newCard.innerHTML = `
                <div class="flashcard-inner">
                    <div class="flashcard-front">${word}</div>
                    <div class="flashcard-back">
                        ${meaning}
                        <button class="delete-btn" title="Xóa thẻ">
                            <i class="bi bi-trash"></i>
                        </button>
                    </div>
                </div>
            `;

            flashcardList.appendChild(newCard);
            modal.classList.remove("active");
            createForm.reset();
        });
    }

    // Xóa thẻ
    document.addEventListener("click", (e) => {
        if (e.target.closest(".delete-btn")) {
            e.stopPropagation();
            const card = e.target.closest(".flashcard");
            card.remove();
        }
    });
});
