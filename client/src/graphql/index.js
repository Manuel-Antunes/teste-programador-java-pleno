import {gql} from "@apollo/client/core"

const sex = gql`
    query {
        characters(page: 1, filter: { name: "rick" }) {
            info {
                count
            }
            results {
                name
            }
        }
        location(id: 1) {
            id
        }
        episodesByIds(ids: [1, 2]) {
            id
        }
    }
`

export {
    sex
}