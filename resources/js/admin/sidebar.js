import feather from 'feather-icons'

document.addEventListener('DOMContentLoaded', () => {
  feather.replace()

  const navItems = {
    'Farm Management': [
      { icon: 'layout', label: 'Dashboard', href: '/', active: true },
      {
        icon: 'leaf', label: 'Crop Management', href: '/crops', subItems: [
          { label: 'Crop Planning', href: '/crops/planning' },
          { label: 'Crop Monitoring', href: '/crops/monitoring' },
          { label: 'Harvest Management', href: '/crops/harvest' },
        ]
      },
      {
        icon: 'droplet', label: 'Soil & Water', href: '/soil-water', subItems: [
          { label: 'Soil Analysis', href: '/soil-water/soil' },
          { label: 'Irrigation', href: '/soil-water/irrigation' },
          { label: 'Water Quality', href: '/soil-water/water-quality' },
        ]
      },
      { icon: 'cloud', label: 'Weather', href: '/weather' },
      {
        icon: 'tool', label: 'Equipment', href: '/equipment', subItems: [
          { label: 'Inventory', href: '/equipment/inventory' },
          { label: 'Maintenance', href: '/equipment/maintenance' },
          { label: 'Usage Logs', href: '/equipment/logs' },
        ]
      },
      { icon: 'clipboard', label: 'Task Management', href: '/tasks' },
      {
        icon: 'users', label: 'Labor Management', href: '/labor', subItems: [
          { label: 'Staff Directory', href: '/labor/staff' },
          { label: 'Scheduling', href: '/labor/scheduling' },
          { label: 'Performance', href: '/labor/performance' },
        ]
      },
      { icon: 'bar-chart-2', label: 'Reports & Analytics', href: '/reports' },
    ],
    'System': [
      { icon: 'settings', label: 'Settings', href: '/settings' },
      { icon: 'user', label: 'My Account', href: '/account' },
      { icon: 'help-circle', label: 'Help & Support', href: '/help' },
    ]
  }

  const navContainer = document.getElementById('nav-container')

  const renderNav = () => {
    navContainer.innerHTML = ''
    for (const [category, items] of Object.entries(navItems)) {
      const categoryWrapper = document.createElement('div')
      categoryWrapper.className = 'mb-4'

      const button = document.createElement('button')
      button.className = 'flex items-center justify-between w-full px-5 py-2 text-sm font-medium text-gray-600 hover:bg-gray-50 transition-colors'
      button.innerHTML = `<span>${category}</span><i data-feather="chevron-down" class="w-4 h-4"></i>`

      const ul = document.createElement('ul')
      ul.className = 'mt-1 space-y-1'

      items.forEach(item => {
        const li = document.createElement('li')

        const link = document.createElement('a')
        link.href = item.href
        link.className = `flex items-center px-5 py-2.5 text-sm ${item.active ? 'bg-green-50 text-green-600 border-l-4 border-green-500' : 'text-gray-700 hover:bg-gray-100 border-l-4 border-transparent'} transition-all duration-200`
        link.innerHTML = `<i data-feather="${item.icon}" class="w-4 h-4 ${item.active ? 'text-green-500' : 'text-gray-500'}"></i><span class="ml-3">${item.label}</span>`

        li.appendChild(link)

        if (item.subItems) {
          const subUl = document.createElement('ul')
          subUl.className = 'ml-9 mt-1 space-y-1 border-l border-gray-200 pl-3'

          item.subItems.forEach(sub => {
            const subLi = document.createElement('li')
            const subLink = document.createElement('a')
            subLink.href = sub.href
            subLink.textContent = sub.label
            subLink.className = 'block py-1.5 px-3 text-sm rounded-md text-gray-600 hover:text-gray-900 hover:bg-gray-50 transition-colors'
            subLi.appendChild(subLink)
            subUl.appendChild(subLi)
          })

          li.appendChild(subUl)
        }

        ul.appendChild(li)
      })

      categoryWrapper.appendChild(button)
      categoryWrapper.appendChild(ul)
      navContainer.appendChild(categoryWrapper)
    }

    feather.replace()
  }

  renderNav()

  // Sidebar toggle logic
  const sidebar = document.getElementById('sidebar')
  const toggleBtn = document.getElementById('toggle-sidebar')
  const chevronIcon = document.getElementById('chevron-icon')
  const brandText = document.getElementById('brand-text')

  toggleBtn.addEventListener('click', () => {
    const collapsed = sidebar.classList.toggle('w-20')
    brandText.classList.toggle('hidden')
    chevronIcon.classList.toggle('rotate-180')
  })

  // Mobile menu toggle
  const mobileMenuButton = document.getElementById('mobile-menu-button')
  mobileMenuButton.addEventListener('click', () => {
    sidebar.classList.toggle('hidden')
  })
})
