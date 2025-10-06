 // ვიზუალური ეფექტები - კურსორის ჰოვერი პროექტებზე
        document.addEventListener('DOMContentLoaded', function() {
            const cards = document.querySelectorAll('.project-card');
            cards.forEach(card => {
                card.addEventListener('mouseenter', () => {
                    card.style.cursor = 'pointer';
                    card.querySelector('.card-title').style.transform = 'scale(1.05)';
                });
                card.addEventListener('mouseleave', () => {
                    card.querySelector('.card-title').style.transform = 'scale(1)';
                });
            });
        });