package main

import (
	"fmt"
	"github.com/uber/h3-go/v4"
	"os"
	"strconv"
)

func cellToParent(indexString string, parentRes int) (string, error) {
	// Create a Cell from the parsed H3 index
	index := h3.IndexFromString(indexString)

	cell := h3.Cell(index)

	// Get the parent H3 index with the specified resolution
	parentIndex := cell.Parent(parentRes)

	return fmt.Sprintf("%x", uint64(parentIndex)), nil
}

func main() {
	// Check if the number of command-line arguments is correct
	if len(os.Args) != 3 {
		fmt.Println("Error: Usage: ./cellToParent h3IndexAsString parentResolution")
		os.Exit(1)
	}

	// Get the H3 index as a string and parent resolution from the command-line arguments
	h3IndexString := os.Args[1]
	parentRes, err := strconv.Atoi(os.Args[2])
	if err != nil {
		fmt.Println("Error: Parsing parent resolution:", err)
		os.Exit(1)
	}

	// Get the parent H3 index
	parentIndex, err := cellToParent(h3IndexString, parentRes)
	if err != nil {
		fmt.Println("Error:", err)
		os.Exit(1)
	}

	// Print the parent H3 index
	fmt.Printf("%s", parentIndex)
}