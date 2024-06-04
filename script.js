// Sample menu data (you can replace this with your actual data)
const menuItems = [
    {
        name: "rajma rice",
        description: "creamy and delicious cooked in Punjabi style .",
        price: 80,
        image: "http://farm8.static.flickr.com/7084/7361758664_7f9d1d71be_z.jpg"
    },
    {
        name: "paneer paratha",
        description: "butteryy and mouth wateringgg",
        price: 90,
        image: "https://tse2.mm.bing.net/th?id=OIP.x-y671qHlxPIFCxOSbqKwAHaE8&pid=Api&P=0&h=180"
    },
    {
        name: "sabudana khichdi",
        description: "healthyy andd yummyx.",
        price: 70,
        image: "https://3.bp.blogspot.com/-RJhsS4MxjKs/VggWDiqsYOI/AAAAAAAADbM/AJ0ZAhs2O_c/s1600/DSC_3270.jpg"
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

// Populate the menu section with menu items
const menuItemsContainer = document.querySelector(".menu-items");

menuItems.forEach(item => {
    const menuItemHTML = generateMenuItemHTML(item);
    menuItemsContainer.innerHTML += menuItemHTML;
});
