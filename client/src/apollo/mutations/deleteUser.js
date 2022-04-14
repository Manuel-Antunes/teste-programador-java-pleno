import { gql } from "@apollo/client/core";

export const deleteUser = gql`
  mutation DeleteUser($code: String!) {
    deleteUser(code: $code)
  }
`;
