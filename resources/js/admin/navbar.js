document.addEventListener("DOMContentLoaded", () => {
    const notifToggle = document.getElementById("notifToggle");
    const notifDropdown = document.getElementById("notifDropdown");
    const notifCount = document.getElementById("notifCount");
    const notifList = document.getElementById("notifList");
    const markAllRead = document.getElementById("markAllRead");

    const userToggle = document.getElementById("userDropdownToggle");
    const userDropdown = document.getElementById("userDropdown");

    const notifications = [
        {
            id: 1,
            title: "New weather alert",
            message: "Heavy rain expected in your area tomorrow.",
            time: "10 minutes ago",
            read: false,
        },
        {
            id: 2,
            title: "Task completed",
            message: "John Doe has completed the irrigation task.",
            time: "1 hour ago",
            read: false,
        },
        {
            id: 3,
            title: "System update",
            message: "FarmVista has been updated to version 2.4.0",
            time: "Yesterday",
            read: true,
        },
    ];

    function renderNotifications() {
        notifList.innerHTML = "";
        const unread = notifications.filter((n) => !n.read).length;
        notifCount.textContent = unread;
        notifCount.classList.toggle("hidden", unread === 0);

        if (notifications.length === 0) {
            notifList.innerHTML = `<div class="py-6 text-center text-gray-500"><p>No notifications</p></div>`;
        } else {
            notifications.forEach((n) => {
                const notifItem = document.createElement("div");
                notifItem.className = `p-3 border-b border-gray-100 ${
                    !n.read ? "bg-green-50" : ""
                }`;
                notifItem.innerHTML = `
            <div class="flex justify-between">
              <h4 class="text-sm font-medium">${n.title}</h4>
              <button onclick="dismissNotification(${
                  n.id
              })" class="text-gray-400 hover:text-gray-600">
                &times;
              </button>
            </div>
            <p class="text-xs text-gray-600 mt-1">${n.message}</p>
            <div class="flex justify-between items-center mt-2">
              <span class="text-xs text-gray-500">${n.time}</span>
              ${
                  !n.read
                      ? `<button onclick="markAsRead(${n.id})" class="text-xs text-green-600 hover:text-green-800">Mark as read</button>`
                      : ""
              }
            </div>
          `;
                notifList.appendChild(notifItem);
            });
        }
    }

    window.dismissNotification = (id) => {
        const index = notifications.findIndex((n) => n.id === id);
        if (index !== -1) notifications.splice(index, 1);
        renderNotifications();
    };

    window.markAsRead = (id) => {
        const notif = notifications.find((n) => n.id === id);
        if (notif) notif.read = true;
        renderNotifications();
    };

    markAllRead.addEventListener("click", () => {
        notifications.forEach((n) => (n.read = true));
        renderNotifications();
    });

    notifToggle.addEventListener("click", () => {
        notifDropdown.classList.toggle("hidden");
    });

    userToggle.addEventListener("click", () => {
        userDropdown.classList.toggle("hidden");
    });

    document.addEventListener("click", (e) => {
        if (
            !notifDropdown.contains(e.target) &&
            !notifToggle.contains(e.target)
        ) {
            notifDropdown.classList.add("hidden");
        }
        if (
            !userDropdown.contains(e.target) &&
            !userToggle.contains(e.target)
        ) {
            userDropdown.classList.add("hidden");
        }
    });

    renderNotifications();
});
