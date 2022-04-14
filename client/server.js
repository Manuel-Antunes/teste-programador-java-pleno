const { createServer } = require('vite')
const express = require('express')
const path = require('path')

const vite = createServer({ server: { middlewareMode: "ssr" } })
const app = express()
const PORT = process.env.PORT || 3000

app.use(express.static(path.join(__dirname, 'build')))
app.get('*', function (req, res) {
    const alguma = (path.join(__dirname, 'dist', 'index.html'))
    console.log(alguma);
    res.sendFile(alguma)
})

app.listen(PORT, () => console.log(`Listening on :${PORT}`))