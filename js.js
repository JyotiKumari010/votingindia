//navbar



    const menuIcon = document.getElementById('menu-icon');
    const navLinks = document.getElementById('nav-links');

    menuIcon.addEventListener('click', () => {
        navLinks.classList.toggle('active');
    });




    // Sample data for notices and events
    const notices = [
        { title: "Notice Title 1", content: "Details about notice 1..." },
        { title: "Notice Title 2", content: "Details about notice 2..." },
        // Add more notices as needed
      ];
      
      const events = [
        { title: "Event Title 1", content: "Details about event 1..." },
        { title: "Event Title 2", content: "Details about event 2..." },
        // Add more events as needed
      ];
      
      // Function to dynamically add notices to the page
      function loadNotices() {
        const noticeContainer = document.querySelector('.notice-boxes');
        notices.forEach(notice => {
          const noticeElement = document.createElement('div');
          noticeElement.classList.add('notice');
          noticeElement.innerHTML = `
            <h3>${notice.title}</h3>
            <p>${notice.content}</p>
          `;
          noticeContainer.appendChild(noticeElement);
        });
      }
      
      // Function to dynamically add events to the page
      function loadEvents() {
        const eventContainer = document.querySelector('.event-boxes');
        events.forEach(event => {
          const eventElement = document.createElement('div');
          eventElement.classList.add('event');
          eventElement.innerHTML = `
            <h3>${event.title}</h3>
            <p>${event.content}</p>
          `;
          eventContainer.appendChild(eventElement);
        });
      }
      
      // Load more notices when button is clicked
      document.getElementById('loadNotices').addEventListener('click', loadNotices);
      
      // Load more events when button is clicked
      document.getElementById('loadEvents').addEventListener('click', loadEvents);
      
      // Initial load of notices and events on page load
      loadNotices();
      loadEvents();
      



// about page 



  const loadMoreBtn = document.querySelector('.load-more-btn');
  let faqItems = document.querySelectorAll('.about-faq-item');

  // Initially hide all but the first 3 FAQ items
  faqItems.forEach((item, index) => {
    if (index >= 3) {
      item.style.display = 'none';
    }
  });

  loadMoreBtn.addEventListener('click', () => {
    // Show the hidden FAQ items
    faqItems.forEach(item => {
      item.style.display = 'block';
    });
    loadMoreBtn.style.display = 'none'; // Hide the "Load More" button after it's clicked
  });

