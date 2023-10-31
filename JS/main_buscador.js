// const sectionElements = document.querySelector("[data-header]");
// const searchInput = document.querySelector("[data-search]")
// const titleElement = document.querySelectorAll("[data-title]")

// searchInput.addEventListener("input", e => {
//     const value = e.target.value.toLowerCase()
//     titleElement.forEach(title => {
//         console.log(title)
//         const ti = title.querySelector("h1").textContent.toLowerCase()
//         const header = Array.from(title.querySelectorAll("h2")).map(h => h.textContent.toLowerCase())
//         const isVisible = ti.includes(value) || header.some(h => h.includes(value))
//         title.classList.toggle("hide", !isVisible)
//         console.log(header)
//     })
// })