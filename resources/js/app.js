import "./bootstrap"
import { gsap } from "gsap"
import { ScrollTrigger } from "gsap/ScrollTrigger"

// Register ScrollTrigger plugin
gsap.registerPlugin(ScrollTrigger)

document.addEventListener("DOMContentLoaded", () => {
  // Initialize animations
  initAnimations()

  // Initialize scroll animations
  initScrollAnimations()
})

function initAnimations() {
  // Hero section animations
  const heroTimeline = gsap.timeline()

  heroTimeline
    .from(".hero-title", {
      opacity: 0,
      y: 50,
      duration: 0.8,
      ease: "power3.out",
    })
    .from(
      ".hero-description",
      {
        opacity: 0,
        y: 30,
        duration: 0.6,
        ease: "power3.out",
      },
      "-=0.4",
    )
    .from(
      ".hero-search",
      {
        opacity: 0,
        y: 30,
        duration: 0.6,
        ease: "power3.out",
      },
      "-=0.3",
    )
    .from(
      ".hero-graphic",
      {
        opacity: 0,
        scale: 0.9,
        duration: 0.8,
        ease: "power3.out",
      },
      "-=0.5",
    )
    .from(
      ".hero-card",
      {
        opacity: 0,
        scale: 0.8,
        stagger: 0.2,
        duration: 0.6,
        ease: "back.out(1.7)",
      },
      "-=0.4",
    )

  // Stats counter animation
  const statsElements = document.querySelectorAll(".stats-number")
  statsElements.forEach((stat) => {
    const target = Number.parseInt(stat.textContent.replace(/[^0-9]/g, ""))
    gsap.to(stat, {
      innerText: target,
      duration: 2,
      ease: "power2.out",
      snap: { innerText: 1 },
      scrollTrigger: {
        trigger: stat,
        start: "top 80%",
      },
    })
  })
}

function initScrollAnimations() {
  // Animate elements when they come into view
  gsap.utils.toArray(".fade-in, .slide-up, .slide-right, .slide-left, .scale-in").forEach((element) => {
    gsap.from(element, {
      opacity: 0,
      y: element.classList.contains("slide-up") ? 50 : 0,
      x: element.classList.contains("slide-right") ? -50 : element.classList.contains("slide-left") ? 50 : 0,
      scale: element.classList.contains("scale-in") ? 0.9 : 1,
      duration: 0.8,
      ease: "power3.out",
      scrollTrigger: {
        trigger: element,
        start: "top 85%",
        toggleClass: "active",
      },
    })
  })

  // Feature cards staggered animation
  gsap.from(".feature-card", {
    opacity: 0,
    y: 50,
    stagger: 0.2,
    duration: 0.6,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".features-section",
      start: "top 70%",
    },
  })

  // Job cards staggered animation
  gsap.from(".job-card", {
    opacity: 0,
    y: 30,
    stagger: 0.15,
    duration: 0.6,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".jobs-section",
      start: "top 70%",
    },
  })

  // Blog posts animation
  gsap.from(".blog-post", {
    opacity: 0,
    y: 40,
    stagger: 0.2,
    duration: 0.7,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".blog-section",
      start: "top 70%",
    },
  })

  // Testimonial cards animation
  gsap.from(".testimonial-card", {
    opacity: 0,
    y: 30,
    stagger: 0.2,
    duration: 0.6,
    ease: "back.out(1.2)",
    scrollTrigger: {
      trigger: ".testimonials-section",
      start: "top 70%",
    },
  })

  // Partner logos animation
  gsap.from(".partner-logo", {
    opacity: 0,
    scale: 0.8,
    stagger: 0.1,
    duration: 0.5,
    ease: "power2.out",
    scrollTrigger: {
      trigger: ".partners-section",
      start: "top 80%",
    },
  })

  // CTA section animation
  gsap.from(".cta-content", {
    opacity: 0,
    x: -50,
    duration: 0.7,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".cta-section",
      start: "top 70%",
    },
  })

  gsap.from(".cta-button", {
    opacity: 0,
    x: 50,
    duration: 0.7,
    ease: "power3.out",
    scrollTrigger: {
      trigger: ".cta-section",
      start: "top 70%",
    },
  })
}

// Add class names to elements for animation targeting
document.addEventListener("DOMContentLoaded", () => {
  // Hero section
  const heroSection = document.querySelector("section:first-of-type")
  if (heroSection) {
    heroSection.classList.add("hero-section")
    heroSection.querySelector("h1")?.classList.add("hero-title")
    heroSection.querySelector("p")?.classList.add("hero-description")
    heroSection.querySelector(".bg-white.rounded-lg.shadow-lg")?.classList.add("hero-search")
    heroSection.querySelector(".bg-blue-50.rounded-full")?.classList.add("hero-graphic")
    heroSection.querySelectorAll(".absolute")?.forEach((card) => card.classList.add("hero-card"))
  }

  // Stats section
  const statsSection = document.querySelector(".bg-blue-900.text-white.py-12")
  if (statsSection) {
    statsSection.classList.add("stats-section")
    statsSection.querySelectorAll(".text-4xl.font-bold")?.forEach((stat) => stat.classList.add("stats-number"))
  }

  // Features section
  const featuresSection = document.querySelector("section:nth-of-type(3)")
  if (featuresSection) {
    featuresSection.classList.add("features-section")
    featuresSection.querySelectorAll(".border-t-2")?.forEach((card) => card.classList.add("feature-card"))
  }

  // Jobs section
  const jobsSection = document.querySelector(".bg-gray-50:not(.testimonials-section)")
  if (jobsSection) {
    jobsSection.classList.add("jobs-section")
    jobsSection.querySelectorAll(".bg-white.rounded-lg.shadow-md")?.forEach((card) => card.classList.add("job-card"))
  }

  // Blog section
  const blogSection = document.querySelector("section:nth-of-type(5)")
  if (blogSection) {
    blogSection.classList.add("blog-section")
    blogSection.querySelectorAll(".bg-white.rounded-lg.shadow-md")?.forEach((post) => post.classList.add("blog-post"))
  }

  // Testimonials section
  const testimonialsSection = document.querySelector(".bg-gray-50:nth-of-type(6)")
  if (testimonialsSection) {
    testimonialsSection.classList.add("testimonials-section")
    testimonialsSection
      .querySelectorAll(".bg-white.rounded-lg.shadow-md")
      ?.forEach((card) => card.classList.add("testimonial-card"))
  }

  // Partners section
  const partnersSection = document.querySelector("section:nth-of-type(7)")
  if (partnersSection) {
    partnersSection.classList.add("partners-section")
    partnersSection.querySelectorAll(".grayscale")?.forEach((logo) => logo.classList.add("partner-logo"))
  }

  // CTA section
  const ctaSection = document.querySelector(".bg-blue-900.text-white:not(.stats-section)")
  if (ctaSection) {
    ctaSection.classList.add("cta-section")
    ctaSection.querySelector(".mb-8.md\\:mb-0")?.classList.add("cta-content")
    ctaSection.querySelector(".inline-flex.items-center.bg-blue-600")?.classList.add("cta-button")
  }

  // Add hover animations
  document.querySelectorAll(".job-card, .blog-post, .testimonial-card").forEach((card) => {
    card.classList.add("hover-lift")
  })

  document.querySelectorAll(".bg-blue-600.hover\\:bg-blue-700").forEach((button) => {
    button.classList.add("hover-scale")
  })
})
