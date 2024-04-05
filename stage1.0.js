document.querySelectorAll('.star').forEach(item => {
    item.addEventListener('click', () => {
      const ratingValue = item.getAttribute('data-value');
      item.parentNode.querySelectorAll('.star').forEach(star => {
        star.style.color = star.getAttribute('data-value') <= ratingValue ? 'gold' : '#ccc';
      });
      // Vous pouvez ici utiliser la valeur ratingValue pour d'autres traitements
      // Par exemple, l'envoyer à un serveur ou l'afficher quelque part sur la page
    });
  });