document.addEventListener('DOMContentLoaded', function() {
    const cards = document.querySelectorAll('.card');

    cards.forEach(card => {
        card.addEventListener('dragstart', dragStart);
        card.addEventListener('dragend', dragEnd);
    });

    function dragStart() {
        this.classList.add('dragging');
    }

    function dragEnd() {
        this.classList.remove('dragging');
    }

    const columns = document.querySelectorAll('.column');

    columns.forEach(column => {
        column.addEventListener('dragover', dragOver);
        column.addEventListener('dragenter', dragEnter);
        column.addEventListener('dragleave', dragLeave);
        column.addEventListener('drop', drop);
    });

    function dragOver(e) {
        e.preventDefault();
    }

    function dragEnter() {
        this.classList.add('dragover');
    }

    function dragLeave() {
        this.classList.remove('dragover');
    }

    function drop() {
        const card = document.querySelector('.dragging');
        this.appendChild(card);
        this.classList.remove('dragover');
    }
});
