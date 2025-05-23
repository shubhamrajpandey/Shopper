<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>Chatbot UI</title>
  <link rel="stylesheet" href="bot.css" />
</head>

<body>
  <div class="chatbot">
    <div class="chat-header">
      <span>Chatbot</span>
      <span class="close-btn">×</span>
    </div>
    <div class="chat-body">
      <div class="bot-message">
        I'm here to help. Ask me anything.
      </div>
    </div>
    <div class="chat-footer">
      <input type="text" placeholder="Type a message..." />
      <button class="send-btn">✈️</button>
    </div>
  </div>
  <div class="we-are-here-bubble">
    We are here!
  </div>


  <div class="chat-icon">
    💬
  </div>

  <script>
    const chatbot = document.querySelector('.chatbot');
    const chatIcon = document.querySelector('.chat-icon');
    const closeBtn = document.querySelector('.close-btn');
    const sendBtn = document.querySelector('.send-btn');
    const chatBody = document.querySelector('.chat-body');
    const inputField = document.querySelector('.chat-footer input');

    chatbot.style.display = 'none';

    chatIcon.addEventListener('click', () => {
      chatbot.style.display = 'block';
      chatIcon.style.display = 'none';
    });

    closeBtn.addEventListener('click', () => {
      chatbot.style.display = 'none';
      chatIcon.style.display = 'block';
    });

    sendBtn.addEventListener('click', sendMessage);
    inputField.addEventListener('keypress', (e) => {
      if (e.key === 'Enter') sendMessage();
    });

    function sendMessage() {
      const message = inputField.value.trim();
      if (message === '') return;

      // Display user message
      const userMsg = document.createElement('div');
      userMsg.textContent = message;
      userMsg.classList.add('user-message');
      chatBody.appendChild(userMsg);

      inputField.value = '';
      chatBody.scrollTop = chatBody.scrollHeight;

      // Simulate bot response with logic
      setTimeout(() => {
        const botMsg = document.createElement('div');
        botMsg.classList.add('bot-message');

        const lowerMsg = message.toLowerCase();

        if (["hi", "hello", "hey"].includes(lowerMsg)) {
          botMsg.textContent = "Hi there! Welcome to our gadget store 👋";
        } else if (lowerMsg.includes("how are you")) {
          botMsg.textContent = "I'm just a bot, but I'm excited to help you shop for cool gadgets! 😊";
        } else if (lowerMsg.includes("help")) {
          botMsg.textContent = "Sure! I can help with orders, browsing gadgets, payments, and more.";
        }else if (lowerMsg.includes("iphone 15") || lowerMsg.includes("iphone fifteen")) {
          botMsg.textContent = "The iPhone 15 Pro is available now! Choose from several colors and storage options. Check the product page for more details.";
        } else if (lowerMsg.includes("ps5") || lowerMsg.includes("playstation 5") || lowerMsg.includes("sony console")) {
          botMsg.textContent = "The PlayStation 5 is in stock! We also have bundle deals and accessories.";
        } else if (lowerMsg.includes("macbook")) {
          botMsg.textContent = "We offer the latest MacBook Air and Pro models. Want to compare specs?";
        } else if (lowerMsg.includes("smart watch") || lowerMsg.includes("smartwatch")) {
          botMsg.textContent = "We carry Apple Watches, Samsung Galaxy Watches, and more. Which features are you looking for?";
        } else if (lowerMsg.includes("airpods")) {
          botMsg.textContent = "AirPods and AirPods Pro are available in our accessories section.";
        } else if (lowerMsg.includes("ipad")) {
          botMsg.textContent = "We have iPad models including the iPad Pro and iPad Air. Want help choosing one?";
        } else if (lowerMsg.includes("what's your name") || lowerMsg.includes("who are you")) {
          botMsg.textContent = "I'm your shopping assistant bot .Here to help you with gadgets!";
        } else if (lowerMsg.includes("thank you") || lowerMsg.includes("thanks")) {
          botMsg.textContent = "You're welcome! Let me know if you need anything else.";
        } else if (lowerMsg.includes("you're amazing") || lowerMsg.includes("good bot")) {
          botMsg.textContent = "Awww, thank you! 😊 You're awesome too!";
        } else if (lowerMsg.includes("tell me a joke")) {
          botMsg.textContent = "Why did the gadget go to school? Because it wanted to be smarter!";
        } else if (lowerMsg.includes("what can you do")) {
          botMsg.textContent = "I can help you explore gadgets, place orders, and answer your questions!";
        } else if (lowerMsg.includes("i love you")) {
          botMsg.textContent = "I love helping you shop! ❤️";
        } else if (lowerMsg.includes("bored") || lowerMsg.includes("i'm bored")) {
          botMsg.textContent = "Why not explore our latest gadgets? Something exciting might catch your eye!";
        } else if (
          (lowerMsg.includes("track") && lowerMsg.includes("order")) ||
          lowerMsg.includes("order status") ||
          lowerMsg.includes("where is my order") ||
          lowerMsg.includes("order tracking")
        ) {
          botMsg.textContent = "Please provide your order ID so I can check the status for you.";
        } else if (
          lowerMsg.includes("return") ||
          lowerMsg.includes("refund") ||
          lowerMsg.includes("return policy") ||
          lowerMsg.includes("how to return") ||
          lowerMsg.includes("can i return")
        ) {
          botMsg.textContent = "You can return products within 30 days. Would you like help with a return?";
        } else if (
          (lowerMsg.includes("cancel") && lowerMsg.includes("order")) ||
          lowerMsg.includes("how to cancel") ||
          lowerMsg.includes("can i cancel")
        ) {
          botMsg.textContent = "I can help you cancel your order. Please provide your order ID.";
        } else if (
          lowerMsg.includes("payment") ||
          lowerMsg.includes("options") ||
          lowerMsg.includes("methods") ||
          lowerMsg.includes("available") ||
          lowerMsg.includes("which payment") ||
          lowerMsg.includes("how can i pay") ||
          lowerMsg.includes("khalti or esewa") ||
          lowerMsg.includes("accept khalti") ||
          lowerMsg.includes("accept esewa")
        ) {
          botMsg.textContent = "We accept Khalti, eSewa, and Cash on Delivery (COD) as payment options.";
        } else if (
          lowerMsg.includes("delivery time") ||
          lowerMsg.includes("shipping time") ||
          lowerMsg.includes("when will i get") ||
          lowerMsg.includes("how long does delivery take")
        ) {
          botMsg.textContent = "Standard delivery takes 3–5 business days.";
        } else if (
          lowerMsg.includes("out of stock") ||
          lowerMsg.includes("when will it be available") ||
          lowerMsg.includes("restock") ||
          lowerMsg.includes("available soon")
        ) {
          botMsg.textContent = "If an item is out of stock, you can click 'Notify Me' to get an update.";
        } else if (
          lowerMsg.includes("account") ||
          lowerMsg.includes("login") ||
          lowerMsg.includes("sign in") ||
          lowerMsg.includes("sign up") ||
          lowerMsg.includes("register")
        ) {
          botMsg.textContent = "To access your account, click the login icon at the top right.";
        } else if (
          (lowerMsg.includes("password") && lowerMsg.includes("reset")) ||
          lowerMsg.includes("forgot password") ||
          lowerMsg.includes("reset my password")
        ) {
          botMsg.textContent = "Click on 'Forgot Password' to reset your password.";
        } else if (
          lowerMsg.includes("contact") ||
          lowerMsg.includes("support") ||
          lowerMsg.includes("help center") ||
          lowerMsg.includes("customer service")
        ) {
          botMsg.textContent = "You can contact our support team at support@example.com.";
        } else if (
          lowerMsg.includes("product details") ||
          lowerMsg.includes("specifications") ||
          lowerMsg.includes("features") ||
          lowerMsg.includes("product info")
        ) {
          botMsg.textContent = "You can find detailed information on each product page.";
        } else if (lowerMsg.includes("wishlist")) {
          botMsg.textContent = "You can add gadgets to your wishlist by clicking the ❤️ icon.";
        } else if (lowerMsg.includes("cart")) {
          botMsg.textContent = "Gadgets added to your cart will be saved until you're ready to checkout.";
        } else if (lowerMsg.includes("quick view")) {
          botMsg.textContent = "Hover over any gadget and click 'Quick View' for a fast preview.";
        } else if (lowerMsg.includes("categories")) {
          botMsg.textContent = "We have categories like Smartphones, Laptops, Accessories, and more.";
        } else if (lowerMsg.includes("latest")) {
          botMsg.textContent = "Check the 'Latest Products' section on the homepage for new arrivals!";
        } else if (lowerMsg.includes("popular")) {
          botMsg.textContent = "Our most-loved gadgets are listed under 'Popular Products'.";
        } else if (lowerMsg.includes("about us")) {
          botMsg.textContent = "We’re passionate about bringing you the best gadgets at great prices!";
        } else if (lowerMsg.includes("orders")) {
          botMsg.textContent = "Visit the Orders page to view or manage your purchases.";
        } else if (lowerMsg.includes("products")) {
          botMsg.textContent = "Head over to the Products page to browse all our available gadgets.";
        } else if (lowerMsg.includes("khalti")) {
          botMsg.textContent = "Khalti is accepted! Choose it during checkout.";
        } else if (lowerMsg.includes("esewa")) {
          botMsg.textContent = "Yes! eSewa is one of our trusted payment partners.";
        } else if (lowerMsg.includes("store") && lowerMsg.includes("location")) {
          botMsg.textContent = "We're fully online and deliver across the country!";
        } else if (lowerMsg.includes("where can i buy")) {
          botMsg.textContent = "You can buy all our gadgets directly from our online store!";
        } else if (lowerMsg.includes("how do i place an order")) {
          botMsg.textContent = "To place an order, browse products, add them to your cart, and proceed to checkout.";
        } else if (lowerMsg.includes("how do i get my receipt")) {
          botMsg.textContent = "Your order receipt will be sent to your email once your order is confirmed.";
        } else if (lowerMsg.includes("gift card")) {
          botMsg.textContent = "We offer gift cards! You can purchase them on our website.";
        } else if (lowerMsg.includes("track delivery")) {
          botMsg.textContent = "Enter your tracking number on the order page to track your delivery.";
        } else if (lowerMsg.includes("international shipping")) {
          botMsg.textContent = "We currently only offer shipping within the country.";
        } else if (lowerMsg.includes("promo code")) {
          botMsg.textContent = "Do you have a promo code? You can apply it during checkout.";
        } else if (lowerMsg.includes("apply discount")) {
          botMsg.textContent = "Enter your discount code during checkout to apply the discount.";
        } else if (lowerMsg.includes("what’s the warranty")) {
          botMsg.textContent = "Most gadgets come with a one-year warranty. Check individual product pages for details.";
        } else if (lowerMsg.includes("do you offer repair services")) {
          botMsg.textContent = "We currently do not offer repair services, but you can contact the manufacturer.";
        } else if (lowerMsg.includes("exchange products")) {
          botMsg.textContent = "We do not currently offer exchanges, but you can return the product for a refund.";
        } else if (lowerMsg.includes("shipping cost")) {
          botMsg.textContent = "Shipping costs are calculated at checkout based on your location.";
        } else if (lowerMsg.includes("free shipping")) {
          botMsg.textContent = "We offer free shipping for orders above $100!";
        } else if (lowerMsg.includes("does it come in other colors")) {
          botMsg.textContent = "Check the product page for color options available for that gadget.";
        } else if (lowerMsg.includes("can i change my order")) {
          botMsg.textContent = "Please contact support to modify your order if it's still processing.";
        } else if (lowerMsg.includes("do you have discounts")) {
          botMsg.textContent = "We often run promotions! Sign up for our newsletter to get notified of discounts.";
        } else if (lowerMsg.includes("how do i cancel my subscription")) {
          botMsg.textContent = "If you have a subscription, please contact support to manage it.";
        } else if (lowerMsg.includes("payment failed")) {
          botMsg.textContent = "If your payment failed, try again or contact your payment provider for assistance.";
        } else {
          botMsg.textContent = "I'm your gadget assistant. Ask me anything about shopping or just say hi!";
        }

        chatBody.appendChild(botMsg);
        chatBody.scrollTop = chatBody.scrollHeight;
      }, 500);
    }
  </script>
</body>

</html>