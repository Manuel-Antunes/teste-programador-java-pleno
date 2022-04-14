import { gql } from "@apollo/client/core"

export const updateProduct = gql`
    mutation UpdateProduct($name: String!, $description: String!, $units: Int!, $price: Float!){
        updateProduct(name: $name, desc:$description, units:$units,price:$price) {
            name,
            desc,
            units,
            price
        }
    }
`