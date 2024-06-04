// Sample menu data (you can replace this with your actual data)
const menuItems = [
    {
        name: "Food Item 1",
        description: "Description of Food Item 1.",
        price: 10.99,
        image: "food1.jpg"
    },
    {
        name: "Food Item 2",
        description: "Description of Food Item 2.",
        price: 12.99,
        image: "food2.jpg"
    },
    {
        name: "Food Item 3",
        description: "Description of Food Item 3.",
        price: 9.99,
        image: "food3.jpg"
    }
];

// Function to generate menu item HTML
function generateMenuItemHTML(item) {
    return `
        <div class="menu-item">
            <img src="${item.image}" alt="${item.name}">
            <h3>${item.name}</h3>
            <p>${item.description}</p>
            <span class="price">$${item.price.toFixed(2)}</span>
        </div>
    `;
}

// Function to toggle the menu visibility
function toggleMenu() {
    const menu = document.getElementById("menu");
    const menuButton = document.getElementById("menu-button");

    if (menu.style.display === "block") {
        menu.style.display = "none";
        menuButton.textContent = "Show Menu";
    } else {
        menu.style.display = "block";
        menuButton.textContent = "Hide Menu";
        
        // Populate the menu section with menu items
        const menuItemsContainer = document.querySelector(".menu-items");
        menuItemsContainer.innerHTML = ""; // Clear existing items
        
        menuItems.forEach(item => {
            const menuItemHTML = generateMenuItemHTML(item);
            menuItemsContainer.innerHTML += menuItemHTML;
        });
    }
}

// Add an event listener to the "Menu" button
const menuButton = document.getElementById("menu-button");
menuButton.addEventListener("click", toggleMenu);
