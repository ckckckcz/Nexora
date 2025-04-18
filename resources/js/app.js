"use client"

import "./bootstrap"

document.addEventListener("DOMContentLoaded", () => {
  initFramerAnimations()

  initChartBars()

  initStatCounters()
})

function initFramerAnimations() {
  const animatedElements = document.querySelectorAll("[data-framer-animation]")

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const element = entry.target
          const animation = element.getAttribute("data-framer-animation")
          const delay = element.getAttribute("data-framer-delay") || 0

          setTimeout(() => {
            // Apply the animation
            element.style.transition = "opacity 0.6s ease, transform 0.6s ease"
            element.style.opacity = "1"

            if (animation === "fade-in-up") {
              element.style.transform = "translateY(0)"
            } else if (animation === "fade-in-down") {
              element.style.transform = "translateY(0)"
            } else if (animation === "fade-in-left") {
              element.style.transform = "translateX(0)"
            } else if (animation === "fade-in-right") {
              element.style.transform = "translateX(0)"
            } else if (animation === "scale-in") {
              element.style.transform = "scale(1)"
            }

            // Unobserve after animation
            observer.unobserve(element)
          }, delay * 1000)
        }
      })
    },
    {
      threshold: 0.1,
    },
  )

  animatedElements.forEach((element) => {
    observer.observe(element)
  })
}

function initChartBars() {
  const chartBars = document.querySelectorAll(".chart-bar")

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const bar = entry.target
          const height = bar.getAttribute("data-height")

          setTimeout(() => {
            bar.style.height = `${height}%`
            observer.unobserve(bar)
          }, 300)
        }
      })
    },
    {
      threshold: 0.1,
    },
  )

  chartBars.forEach((bar) => {
    observer.observe(bar)
  })
}

function initStatCounters() {
  const statNumbers = document.querySelectorAll(".stat-number")

  const observer = new IntersectionObserver(
    (entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          const stat = entry.target
          const value = Number.parseInt(stat.getAttribute("data-value"))
          const suffix = stat.getAttribute("data-suffix") || ""
          let displayValue = 0

          // For millions, display as decimal
          const isMillion = value >= 1000000
          const targetValue = isMillion ? value / 1000000 : value

          // Animate the counter
          const duration = 2000 // 2 seconds
          const frameDuration = 1000 / 60 // 60fps
          const totalFrames = Math.round(duration / frameDuration)
          const increment = targetValue / totalFrames

          let currentFrame = 0

          const counter = setInterval(() => {
            currentFrame++
            displayValue = Math.min(Math.ceil(increment * currentFrame), targetValue)

            stat.textContent = isMillion ? displayValue.toFixed(1) + suffix : displayValue + suffix

            if (currentFrame === totalFrames) {
              clearInterval(counter)
            }
          }, frameDuration)

          observer.unobserve(stat)
        }
      })
    },
    {
      threshold: 0.5,
    },
  )

  statNumbers.forEach((stat) => {
    observer.observe(stat)
  })
}
