let searchButton = document.querySelector(".search-btn");
let searchInput = document.querySelector(".search-wrapper");
let resultsDiv = document.querySelector(".results");

let typingTimer;
let isLoaderVisible = false;
let previousValue;

searchInput.addEventListener("keyup", async function () {
  let inputLength = searchInput.value.length;
  if (inputLength >= 3) {
    searchButton.disabled = false;
    if (searchInput.value != previousValue) {
      clearTimeout(typingTimer);
      if (searchInput.value) {
        if (!isLoaderVisible) {
          searchButton.innerHTML = "<span class='loader'></span>";
          isLoaderVisible = true;
        }
        typingTimer = setTimeout(async function () {
          try {
            const response = await fetch(
              academyData.root_url +
                "/wp-json/academy/v1/search?term=" +
                searchInput.value
            );
            const postsResults = await response.json();
            resultsDiv.classList.add("search-overlay_active");
            let limit = resultsDiv.getAttribute("data-limit");
            resultsDiv.innerHTML = `
            ${
              postsResults.length
                ? "<div>"
                : "<p class='fw-bold'>No search results.</p>"
            }

            ${postsResults
              .slice(0, limit)
              .map(
                (item) => `
            <a href="${item.permalink}" class="search-link d-flex pt-3 gap-3 px-1">
              <img class="rounded-3" src="${item.thumbnail}" style="height: 80px; width: 80px" alt="">
              <div>
                <h5 class="fw-bold search-title lines-1">${item.title}</h5>
                <p class="lines-1">${item.excerpt}</p>
              </div>
            </a>`
              )
              .join("")}

            ${postsResults.length ? "</div>" : ""}
            ${
              postsResults.length > limit
                ? `<div class='mt-4 border-top'><a class='all-results fw-bold' href='${academyData.root_url}/?s=${searchInput.value}'>See all results</a></div>`
                : ""
            }`;
          } catch (e) {
            console.log(e);
          }

          searchButton.innerHTML =
            "<i class='fa-solid fa-magnifying-glass'></i>";
        }, 500);
      }
    }
    previousValue = searchInput.value;
  } else {
    searchButton.disabled = true;
    resultsDiv.classList.remove("search-overlay_active");
    resultsDiv.innerHTML = "";
    isLoaderVisible = false;
    return;
  }
});

searchInput.addEventListener("blur", function (e) {
  if (!resultsDiv.contains(e.relatedTarget)) {
    resultsDiv.classList.remove("search-overlay_active");
  }
});

searchInput.addEventListener("focus", function () {
  resultsDiv.classList.add("search-overlay_active");
});

resultsDiv.addEventListener("click", function (e) {
  e.stopPropagation();
});

let loadMoreBtn = document.querySelector(".load-more");

loadMoreBtn ? loadMoreBtn.addEventListener("click", loadMorePosts) : "";

function loadMorePosts() {
  let httpRequest = new XMLHttpRequest();
  let currentCount = document.querySelectorAll(".unfeatured-post").length + 1;
  let catID = loadMoreBtn.dataset.cat;
  let url =
    academyData.root_url +
    "/wp-json/wp/v2/posts?_embed&per_page=10&offset=" +
    currentCount +
    "&categories=" +
    catID;

  httpRequest.onreadystatechange = function () {
    if (httpRequest.readyState === XMLHttpRequest.DONE) {
      if (httpRequest.status === 200) {
        let response = JSON.parse(httpRequest.responseText);
        console.log(response);
        displayMorePosts(response);

        let totalPosts = parseInt(httpRequest.getResponseHeader("X-WP-Total"));
        if (currentCount + response.length >= totalPosts) {
          loadMoreBtn.style.display = "none";
        }
      } else {
        console.log("There was a problem with the request.");
      }
    }
  };

  httpRequest.open("GET", url);
  httpRequest.send();
}

function displayMorePosts(posts) {
  let postContainer = document.querySelector(".post-container");

  for (let i = 0; i < posts.length; i++) {
    let post = posts[i];
    let postElement = document.createElement("div");
    let postDate = new Date(post.date);
    let formattedDate = postDate.toLocaleDateString("en-US", {
      year: "numeric",
      month: "long",
      day: "numeric",
    });

    let featuredMedia = post._embedded["wp:featuredmedia"]
      ? post._embedded["wp:featuredmedia"][0]["source_url"]
      : "";

    postElement.className =
      "unfeatured-post py-1 mt-2 d-md-flex col-12 col-lg-6";
    postElement.innerHTML = `
    <a href=${post.link}>
      <div class="text-dark d-flex gap-3">
      <img class="col-12 d-block rounded-4" src=${featuredMedia} alt="News image">
      <div class="latest-news-text">
        <div class="latest-news-date">${formattedDate}</div>
        <h4 class="latest-news-title fw-bold lines-2">${post.title.rendered}</h4>
      </div>
      </div>
    </a>
    `;
    postContainer.appendChild(postElement);
  }
}
