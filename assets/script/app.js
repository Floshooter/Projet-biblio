/* Navbar */

let menu = document.querySelector('#menu-icon');
let navbar = document.querySelector('.navbar');

menu.onclick = () => {
    menu.classList.toggle('bx-x');
    navbar.classList.toggle('open')
}

/* API */

class API {
    static searchBook(value) {
        axios.get(`https://www.googleapis.com/books/v1/volumes?q=subject:${value}&langRestrict=fr`)
        .then((res) => {
            const search = res.data
            console.log(search)
        })
        .catch((err) => console.log(err))
    }
}

class Books {
    constructor(book,ul) {
        this.id = book.id
        this.title = book.title
        this.authors = book.authors
        this.publishedDate = book.publishedDate
        this.status = book.status
        this.list = ul
    }
    render() {
        const li = document.createElement('li')
        const id = document.createElement('h4')
        const title = document.createElement('h3')
        const authors = document.createElement('h3')
        const date = document.createElement('h3')
        const addBtn = document.createElement('button')
        const delBtn = document.createElement('button')

        id.textContent = this.id
        title.textContent = this.volumeInfo.title
        authors.textContent = this.volumeInfo.authors
        date.textContent = this.volumeInfo.publishedDate

        delBtn.classList.add('del-btn')

        li.append(id, title, authors, date)
        this.list.appendCHild(li)

        if (this.status != 'in-list') {
            li.appendChild(addBtn)
            addBtn.addEventListener('click', () => {
                MyList.addToList(this)})
        } else {
            li.appendChild(delBtn)
            delBtn.addEventListener('click', () => {
                MyList.removeFromList(this)})
        }
    }
}

class MyList {
    static myList = []

    static addToList(book) {
        book.status = 'in-list'
        this.myList.push(book)
    }

    static removeFromList(book) {
        const newList = this.myList.filter(item => item.title != book.title)
        this.myList = newList
        this.apply.displayResults(this.myList)
    }
}

class App {
    init() {
        const submit = document.querySelector('.submit')
        const btnList = document.querySelector('.btn-list')
        const input = document.querySelector('input')

        submit.addEventListener('click', () => {
            API.searchBook(input.value)
        })

        btnList.addEventListener('click', () => {
            App.displayResults(MyList.myList)
        })
    }

    static displayResults(books) {
        const ul = document.querySelector('ul')
        ul.innerHTML = ''

        books.map(book => {
            const newBook = new Books(book,ul)
            newBook.render()
        })
    }
}

window.addEventListener('DOMContentLoaded', () => {
    const app = new App
    app.init()
})