import { gql } from "@apollo/client/core"

export const createProduct = gql`
    mutation CreateProduct($name: String!, $description: String!, $units: Int!, $price: Float!){
        createProduct(name: $name, desc:$description, units:$units,price:$price) {
            name,
            desc,
            units,
            price
        }
    }
`