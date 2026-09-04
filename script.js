
// ================================
// TEAM MEMBER INFORMATION
// ================================

const teamMembers = [
    {
        name: "Miguel Rivera",
        image: "miguel.png",
        role: "Group Leader",
        bio: "Miguel is responsible for leading the group, coordinating tasks, and managing the project.",
        skills: ["Leadership", "Programming", "Planning", "Communication"]
    },

    {
        name: "Annaliza",
        image: "analiza.jpg",
        role: "Layout Designer",
        bio: "Annaliza creates the visual layout and makes the website attractive and user-friendly.",
        skills: ["UI Design", "Layout", "Creativity", "CSS"]
    },

    {
        name: "Maria Madonna",
        image: "madona.jpg",
        role: "Web Programmer",
        bio: "Maria Madonna develops the website and implements its features.",
        skills: ["HTML", "CSS", "JavaScript", "PHP"]
    },

    {
        name: "Margie",
        image: "margie.jpg",
        role: "Quality Checker",
        bio: "Margie checks the website for errors and ensures that the project works properly.",
        skills: ["Testing", "Debugging", "Documentation"]
    },

    {
        name: "Nikka Joy",
        image: "nikka.jpg",
        role: "Researcher & Documenter",
        bio: "Nikka Joy conducts research and prepares project documents.",
        skills: ["Research", "Writing", "Documentation"]
    },

    {
        name: "Amerie",
        image: "anamarie.jpg",
        role: "System Analyst",
        bio: "Amerie analyzes system requirements and helps identify project features.",
        skills: ["System Analysis", "Problem Solving", "Planning"]
    },

    {
        name: "Yanilyn",
        image: "yannie.jpg",
        role: "Presenter",
        bio: "Yanilyn presents the project and explains its features and objectives.",
        skills: ["Presentation", "Communication", "Public Speaking"]
    }
];


// ================================
// OPEN MODAL
// ================================

function openModal(index) {

    const member = teamMembers[index];

    document.getElementById("modalImg").src = member.image;

    document.getElementById("modalImg").alt = member.name;

    document.getElementById("modalName").textContent = member.name;

    document.getElementById("modalRole").textContent = member.role;

    document.getElementById("modalBio").textContent = member.bio;


    // Display skills

    const skillsContainer =
        document.getElementById("modalSkills");

    skillsContainer.innerHTML = "";


    member.skills.forEach(function(skill) {

        const skillElement =
            document.createElement("span");

        skillElement.textContent = skill;

        skillsContainer.appendChild(skillElement);

    });


    // IMPORTANT:
    // Your CSS uses .modal.active

    document
        .getElementById("profileModal")
        .classList.add("active");
}


// ================================
// CLOSE MODAL
// ================================

function closeModal() {

    document
        .getElementById("profileModal")
        .classList.remove("active");
}


// ================================
// CLOSE WHEN CLICKING OUTSIDE
// ================================

window.addEventListener("click", function(event) {

    const modal =
        document.getElementById("profileModal");

    if (event.target === modal) {

        closeModal();

    }

});


// ================================
// CLOSE WITH ESC KEY
// ================================

document.addEventListener("keydown", function(event) {

    if (event.key === "Escape") {

        closeModal();

    }

});

